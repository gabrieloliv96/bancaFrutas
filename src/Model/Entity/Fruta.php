<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fruta Entity
 *
 * @property int $id_fruta
 * @property string $fruta
 * @property int $classificacao_id
 * @property bool $fresca
 * @property int $qtd_disponivel
 * @property float $preco
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Classificacao $classificacao
 */
class Fruta extends Entity
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
        'fruta' => true,
        'classificacao_id' => true,
        'fresca' => true,
        'qtd_disponivel' => true,
        'preco' => true,
        'created' => true,
        'modified' => true,
        'classificacao' => true,
    ];
}
