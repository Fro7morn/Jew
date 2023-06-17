<?php

use yii\db\Migration;

/**
 * Class m230617_120928_InitDb
 */
class m230617_120928_InitDb extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(120)->notNull(),
        ]);

        $this->createTable('color_dir', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
        ]);

        $this->createTable('type_dir', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
        ]);

        $this->createTable('flowers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'color_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-flowers-color_id',
            'flowers',
            'color_id',
            'color_dir',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-flowers-type_id',
            'flowers',
            'type_id',
            'type_dir',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable('bouquet', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
        ]);

        $this->createTable('flowers_to_bouquet', [
            'id' => $this->primaryKey(),
            'flower_id' => $this->integer()->notNull(),
            'bouquet_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-ftb-bouquet_id',
            'flowers_to_bouquet',
            'bouquet_id',
            'bouquet',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-ftb-flower_id',
            'flowers_to_bouquet',
            'flower_id',
            'flowers',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('flowers_to_bouquet');
        $this->dropTable('bouquet');
        $this->dropTable('flower');
        $this->dropTable('type_id');
        $this->dropTable('color_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230617_120928_InitDb cannot be reverted.\n";

        return false;
    }
    */
}
