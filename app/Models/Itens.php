<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Firebird\Eloquent\Model;

class Itens extends Model
{
  /**
   * Table associated with the model
   *
   * @var string
   */
  protected $table = 'ITENS';

  /**
   * Primary key of the model
   *
   * @var string
   */
  protected $primaryKey = 'CODIGO';
  /**
   * Our model does not have a timestamp
   *
   * @var bool
   */
  public $timestamps = false;

  /**
   * The name of the sequence for generating the primary key
   *
   * @var string
   */
  protected $sequence = 'CODIGO';
}
