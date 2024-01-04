<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCashflowDifferenceView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $query = "
            CREATE VIEW cashflow_difference_view AS
            SELECT ROUND(AVG(income_total - outcome_total)) AS average_difference
            FROM (
                SELECT
                    iduser,
                    SUM(CASE WHEN type = 'income' THEN total ELSE 0 END) AS income_total,
                    SUM(CASE WHEN type = 'outcome' THEN total ELSE 0 END) AS outcome_total
                FROM
                    cashflows
                GROUP BY
                    iduser
                HAVING SUM(CASE WHEN type = 'income' THEN total ELSE 0 END) > 0  -- Only include users with income
            ) AS user_totals;
        ";

        DB::statement($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS cashflow_difference_view');
    }
}
