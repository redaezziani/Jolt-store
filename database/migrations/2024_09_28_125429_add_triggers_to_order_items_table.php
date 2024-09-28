<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddTriggersToOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Trigger to decrease product stock when an order item is inserted
        DB::unprepared('
            CREATE TRIGGER decrease_product_stock AFTER INSERT ON order_items
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET quantity = quantity - NEW.quantity
                WHERE id = NEW.product_id;
            END;
        ');

        // Trigger to increase product stock when an order item is deleted (e.g., order canceled)
        DB::unprepared('
            CREATE TRIGGER increase_product_stock AFTER DELETE ON order_items
            FOR EACH ROW
            BEGIN
                UPDATE products
                SET quantity = quantity + OLD.quantity
                WHERE id = OLD.product_id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the triggers when rolling back
        DB::unprepared('DROP TRIGGER IF EXISTS decrease_product_stock');
        DB::unprepared('DROP TRIGGER IF EXISTS increase_product_stock');
    }
}
