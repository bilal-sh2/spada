<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Information;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'about' => 'Welcome to [Your Company Name], where innovation meets excellence. Established in [Year], we have been at the forefront of delivering cutting-edge solutions that empower businesses and individuals to thrive in a rapidly changing world. Our commitment to quality, integrity, and customer satisfaction is the cornerstone of our success.',
            'about_ar' => 'مرحبًا بكم في [اسم شركتك]، حيث يلتقي الإبداع بالتميز. تأسست شركتنا في [عام]، وكنا في طليعة تقديم الحلول المتطورة التي تمكن الشركات والأفراد من النجاح في عالم سريع التغير. إن التزامنا بالجودة والنزاهة وإرضاء العملاء هو حجر الزاوية في نجاحنا.',
            'phone_number' => '0555 5555 5555',
            'address' => 'Address - city - street',
            'address_ar' => 'العنوان - المدينه - الشارع',
            'email' => 'spada@gmail.com',
        ]);
    }
}
