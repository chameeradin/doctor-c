<?php
namespace App\Modules\User\Contracts;

use App\Contracts\MainRepositoryInterface;

interface UserRepositoryInterface extends MainRepositoryInterface
{
    /**
     * create user
     * @param $data
     * @param $userId
     * @return mixed
     */
    public function saveUser($data, $userId = null);

    /**
     * @param $args
     * @return mixed
     */
    //public function checkRecordAlreadyRegistered($args);

    /**
     * @param array $filters
     * @param boolean $pagination
     * @return mixed
     */
    public function getUsers($filters = [], $pagination = false);

    public function getUserById($id = false);

    public function saveProfile($data, $userId = false, $roleId = false, $isAdmin = false);
}
