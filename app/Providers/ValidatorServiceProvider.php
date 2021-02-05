<?php
/**
 * Created by PhpStorm.
 * User: kalana
 * Date: 9/13/18
 * Time: 3:44 PM
 */

namespace App\Providers;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Validate is_main for questions in category
         * */
        Validator::extend('check_already_available_main_question', function ($attribute, $value, $parameters, $validator) {

            $category_id = explode('.',$parameters[0])[0];
            $question_id = explode('.',$parameters[0])[1];

            $question = Question::where('is_main',1)->where('category',$category_id);

            if ($question_id){
                $question = $question->whereNotIn('id',[$question_id])->get();
            }else{
                $question = $question->get();
            }

            if($question){
                if($question->isEmpty()){
                    return true;
                }else{
                    //$question = $question[0];
                    return false;
                }
            }else{
                return false;
            }
        }, 'Sorry, the selected category already has a main question.');

        /*
         * Yes no section validations
         * */
        /*Validator::extend('check_yes_no_question_selected', function ($attribute, $value, $parameters, $validator) {

            $question = explode('.',$parameters[0])[0];

            if(empty($question)){
                return false;
            }else{
                return true;
            }

        }, 'Please provide :attribute.');*/
    }
}