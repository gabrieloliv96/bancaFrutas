<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id_venda
 * @property int $fruta_id
 * @property int $usuario_id
 * @property int $qtd_vendida
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property float $preco_venda
 *
 * @property \App\Model\Entity\Fruta $fruta
 * @property \App\Model\Entity\Usuario $usuario
 */
class Venda extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fruta_id' => true,
        'usuario_id' => true,
        'qtd_vendida' => true,
        'created' => true,
        'modified' => true,
        'preco_venda' => true,
        'desconta' => true,
        'fruta' => true,
        'usuario' => true,
    ];
}
