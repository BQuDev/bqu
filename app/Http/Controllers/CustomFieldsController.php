<?php

namespace App\Http\Controllers;

use App\CustomField;
use App\CustomFieldOption;
use App\CustomFieldType;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CustomFieldsController extends Controller
{
    public function show($id){
        return view('customFields.create');
    }

    public function store(Request $request){
      //return json_decode($request->form, true);$request->form;
        $formData = json_decode($request->form, true);
        $fieldsFromRequest = array();
        foreach($formData as $fields){

            foreach($fields as $field){
               // dd($field);
                $customFieldType = CustomFieldType::where('type','=',$field['field_type'])->first();

                if($customFieldType){

                    //return $field['field_options']['options'];
                    $fieldsFromRequest[] = $field['cid'];
                    $hasField = CustomField::where('cid','=',$field['cid'])
                        ->where('appraisalsId','=',$request->segment(2))
                        ->first();

                    if($hasField){
                        $hasField->appraisalsId = $request->segment(2);
                        $hasField->customFieldTypeId =$customFieldType->id;
                        $hasField->required = $field['required'];
                        $hasField->label = $field['label'];
                        $hasField->cid = $field['cid'];
                        $hasField->save();

                        if(($customFieldType->id == 3)||($customFieldType->id == 4)){

                            $customFieldOptions = CustomFieldOption::where('customFieldId','=',$hasField->id)->delete();
                            //return $field['field_options']['options'];
                           // return $field['field_options'];

                            foreach($field['field_options']['options'] as $options){
                                $customFieldOptions = new CustomFieldOption();
                                $customFieldOptions->label = $options['label'];
                                $customFieldOptions->customFieldId = $hasField->id;
                                $customFieldOptions->checked =$options['checked'];
                                $customFieldOptions->save();
                            }

                        }

                        continue;
                    }
                    $customField = new CustomField();
                    $customField->appraisalsId = $request->segment(2);
                    $customField->customFieldTypeId =$customFieldType->id;
                    $customField->required = $field['required'];
                    $customField->label = $field['label'];
                    $customField->cid = $field['cid'];
                    $customField->save();

                    if(($customFieldType->id == 3)||($customFieldType->id == 4)){

                        $customFieldOptions = CustomFieldOption::where('customFieldId','=',$hasField->id)->delete();
                        //return $field['field_options']['options'];

                        foreach($field['field_options']['options'] as $options){
                            $customFieldOptions = new CustomFieldOption();
                            $customFieldOptions->label = $options['label'];
                            $customFieldOptions->customFieldId = $hasField->id;
                            $customFieldOptions->checked =$options['checked'];
                            $customFieldOptions->save();
                        }

                    }
                }
            }
        }


        $fieldsFromDB = CustomField::where('appraisalsId','=',$request->segment(2))
            ->get()->toArray();

        //$a = array_diff($fieldsFromDB,$fieldsFromRequest);
        $a = array();

        foreach($fieldsFromDB as $fields){
                $a[] =  $fields['cid'];
        }

        foreach(array_diff($a,$fieldsFromRequest) as $f){

            $user = CustomField::where('cid','=',$f)
                ->where('appraisalsId','=',$request->segment(2))
                ->first();
            $user->delete();
        }
        //return array_diff($a,$fieldsFromRequest);

    }

    public function ajax(Request $request){
        $customFields = DB::table('custom_fields')
            ->join('custom_field_types','custom_fields.customFieldTypeId','=','custom_field_types.id')
            ->where('appraisalsId','=', $request->segment(2))
            ->get(['custom_fields.cid','custom_field_types.type as field_type','label','required','custom_fields.id']);

        $returnArray= array();

        foreach($customFields as $customField){
            $tmpArray= array();
            $tmpArray['cid'] = $customField->cid;
            $tmpArray['field_type'] = $customField->field_type;
            $tmpArray['label'] = $customField->label;
            $tmpArray['required'] = $customField->required;
            //$tmpArray['size'] = "large";
            $tmpArray['field_options']['options'] = DB::table('custom_field_options')->where('customFieldId','=', $customField->id)->get(['custom_field_options.label','custom_field_options.checked']);
            $returnArray[] = $tmpArray;
        }


        return json_encode($returnArray);
    }


}
