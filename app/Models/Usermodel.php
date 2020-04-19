<?php namespace App\Models;

use CodeIgniter\Model;

class Usermodel extends Model
{
    /* name of related table */
    protected $table = 'users';

    /* the primary key for the table */
    protected $primaryKey = 'user_id';

    /* how do you want the results to retrun */
    protected $returnType = 'object'; /* 'array' OR 'object' */

    /* if you want to flag the record as deleted 
    BUT NOT actually delete it. This requires a database field with delete timestamp */
    protected $useSoftDeletes = FALSE;

    /* array list of fields you would like to allow working with */
    protected $allowedFields = ['user_display_name', 'user_email'];

    /* to use timestamps */
    protected $useTimestamps = TRUE;

    protected $createdField  = 'added_on';

    /* we are not using it yet. */
    protected $updatedField  = '';
    protected $deletedField  = '';


    /* There are ways force database validation here 
    see https://codeigniter.com/user_guide/models/model.html#validating-data
    */
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

}
