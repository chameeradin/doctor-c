<?php
function checkRoleForBlade($roles)
{
    $return = false;
    if(in_array(Auth::user()->role->name, $roles)){
        $return = true;
    }

    return $return;
}

function getPatientNameById($id)
{
    return \App\Patient::find($id)->first_name;
}

function getDoctorNameById($id)
{
    return \App\Doctor::find($id)->first_name;
}

function getUserNameById($id){
    return \App\User::find($id)->first_name;
}

function getRoleNameById($roleId)
{
    return \App\Role::find($roleId)->name;
}