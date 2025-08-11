<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define your permissions
        $permissions = [
            'role-create',
            'role-list',
            'role-view',
            'role-edit',
            'role-delete',

            'user-create',
            'user-list',
            'user-edit',
            'user-view',
            'user-delete',

            'user-password-create',
            'user-role-create',

            'testimonial-create',
            'testimonial-edit',
            'testimonial-list',
            'testimonial-view',
            'testimonial-delete',

            'job-create',
            'job-list',
            'job-edit',
            'job-view',
            'job-delete',
            'job-update-status',
            'job-track-order',
            'job-upload-approved-design',
            'job-transaction-history-list',

            'location-list',
            'location-create',
            'location-view',
            'location-edit',
            'location-delete',

            'requisition-create',
            'requisition-list',
            'requisition-edit',
            'requisition-view',

            'supplier-create',
            'supplier-list',
            'supplier-edit',
            'supplier-view',
            'supplier-delete',


            'settings-category-list',
            'settings-category-create',
            'settings-category-edit',
            'settings-category-delete',
            'settings-logo-create',
            'settings-theme-create',
            'settings-hero-text-create',
            'settings-address-create',
            'settings-email-create',
            'settings-phone-text-create',


            'finance-create',
            'finance-expenses-list',
            'finance-edit',
            'finance-delete',
            'finance-payment-history-list',
            'finance-debtors-list',
            'finance-creditors-list',
            'finance-profits-list',
            'finance-expense-update',


            'product-create',
            'product-list',
            'product-view',
            'product-edit',
            'product-delete',

            'customer-create',
            'customer-list',
            'customer-edit',
            'customer-view',
            'customer-delete',
            'customer-cart',
            'customer-checkout',
            'customer-job-orders',
            'customer-transaction-history',

            'transaction-list',


            // Add more permissions as needed
        ];

        // Create the permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $this->command->info('Permissions seeded successfully!');
    }
}


