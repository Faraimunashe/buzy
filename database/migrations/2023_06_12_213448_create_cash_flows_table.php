<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cash_flows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('date');
            $table->decimal('sales_revenue');
            $table->decimal('interest_income');
            $table->decimal('dividend_income');
            $table->decimal('rental_income');
            $table->decimal('capital_contributions');
            $table->decimal('government_grants');
            $table->decimal('proceeds_from_the_sale_of_assets');
            $table->decimal('insuarance_payouts');
            $table->decimal('other_incomes');
            $table->decimal('salaries_and_wages');
            $table->decimal('rent');
            $table->decimal('capital_expenses');
            $table->decimal('utilities');
            $table->decimal('loan_payments');
            $table->decimal('taxes');
            $table->decimal('insuarance_expenses');
            $table->decimal('advertising');
            $table->decimal('mantainance_expenses');
            $table->decimal('other_outflows');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_flows');
    }
};
