<?php
    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Models\JobOrder;
    use App\Models\User;
    use App\Models\JobOrderTracking;
    use Illuminate\Support\Facades\Auth;
    use App\Mail\CustomerOrderReceipt;
    use App\Mail\CustomerOrderToAdmin;
    use App\Traits\HandleFileUpload;
    use Illuminate\Support\Facades\DB;


    //  use Illuminate\Support\Facades\Mail;
    use Mail;
    use Illuminate\Support\Facades\Validator;
    use Barryvdh\DomPDF\Facade\Pdf;

    class CheckoutService
    {
        use HandleFileUpload;
        protected $auth;
        protected $jobOrder;
        protected $user;
        protected $mail;
        protected $order_date;

        public function __construct(Auth $auth, JobOrder $jobOrder, User $user, Mail $mail){
            $this->auth = $auth;
            $this->jobOrder = $jobOrder;
            $this->user = $user;
            $this->mail = $mail;
            $this->order_date = date('Y-m-d');
        }

        protected function updateJobOrders($user, $jobIds,  $order_date, $randomInteger){
            DB::beginTransaction();
            try{
                $approved_designs = $this->handleFileUploadPDF(request()->file('design_file'), request()->file('design_file'), 'approved_designs');
                $this->jobOrder->whereIn('id', $jobIds)->update([
                    'user_id' => $user,
                    'cart_order_status' => 2,
                    'order_no' => $randomInteger,
                ]);

                //save job_order_trackings
                foreach ($jobIds as $jobId) {
                    DB::table('job_order_trackings')->insert([
                        'company_id' => app('company_id'),
                        'job_order_id' => $jobId,
                        'pending_status' => 1,
                        'pending_date' => $order_date
                    ]);
                }
                //save order_approved_designs
                foreach ($jobIds as $jobId) {
                    DB::table('order_approved_designs')->insert([
                        'company_id' => app('company_id'),
                        'job_order_id' => $jobId,
                        'design_name' => $approved_designs,
                        'created_by' => $user,
                    ]);
                }
            DB::commit();
            }catch(\Exception $th){
                DB::rollBack();
                return redirect()->back()->with('flash_error','An Error Occured: Please try later');
            }
        }



        protected function sendOrderEmails($user, $jobIds){
            $userDetails = $this->user->find($this->auth::user()->id);
            $userEmail = $userDetails->email;
            $userName = $userDetails->firstname . ' ' . $userDetails->lastname;

            $orderDetails = $this->jobOrder->whereIn('id', $jobIds)->get();

            $pdfAttachment = Pdf::loadView('front.invoice_attachment', [
                'amount_paid' => 0,
                'userDetails' => $userDetails,
                'orderDetails' => $orderDetails,
            ]);

            $this->mail::to($userEmail)->send(new CustomerOrderReceipt($orderDetails, 0, $userName, $pdfAttachment));
            $this->mail::to(env('MAIL_USERNAME'))->send(new CustomerOrderToAdmin($orderDetails, 0, $userName, $pdfAttachment));
        }


        public function processCheckout(){
            if (!$this->auth::check()) {
                return redirect(route('login', ['status' => 'order']));
            }

            $user = $this->auth::user();
            $jobIds = request('job_id');
            $randomInteger = random_int(100000, 999999);

            $this->updateJobOrders($user->id, $jobIds, $this->order_date, $randomInteger);

            // Send order emails
            try {
                $this->sendOrderEmails($user->id, $jobIds);
            } catch (\Exception $e) {
                // Log the error for debugging
                \log::error('Failed to send order emails: ' . $e->getMessage());

                // Optionally, you can set a flash message to notify the user of the issue
                return redirect(route('track_orders.index'))->with('flash_success', 'Product Order Successful but failed to send email.');
            }


            return redirect(route('track_orders.index'))->with('flash_success', 'Product Order Successful');
        }
    }

