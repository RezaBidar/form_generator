<?php

use Illuminate\Database\Seeder;

class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formId = DB::table('forms')->insertGetId([
            'title' => 'دوره همی',
            'user_id' => 1 ,
            'description' => 'حضور در این دوره همی اجباری نیست',
            'open_at' => date('Y-m-d'),
            'close_at' => date('Y-m-d' , time() + (3600 * 24 * 100) ) ,
            'only_once' => false ,
            'login_required' => true ,
            'link' => str_random(8) ,
        ]);

        DB::table('inputs')->insert([
            'form_id' => $formId ,
            'type' => App\Input::TYPE_TEXT ,
            'label' => 'نام' ,
            'help' => 'نام به فارسی باشد' ,
            'validation' => '' ,
            'required' => true
        ]);

        DB::table('inputs')->insert([
            'form_id' => $formId ,
            'type' => App\Input::TYPE_DATE ,
            'label' => 'تاریخ تولد' ,
            'help' => 'تاریخ تولد را انتخاب کنید' ,
            'validation' => '' ,
            'required' => true
        ]);

        DB::table('inputs')->insert([
            'form_id' => $formId ,
            'type' => App\Input::TYPE_NUMBER ,
            'label' => 'سن' ,
            'help' => 'مقدار باید عددی بین 18 تا 45 باشد' ,
            'validation' => '18-45' ,
            'required' => false
        ]);

        DB::table('inputs')->insert([
            'form_id' => $formId ,
            'type' => App\Input::TYPE_MULTISELECT ,
            'label' => 'تخصص' ,
            'validation' => 'پزشک - پرستاد - بیهوشی - موارد دیگر' ,
            'required' => false
        ]);

    }
}
