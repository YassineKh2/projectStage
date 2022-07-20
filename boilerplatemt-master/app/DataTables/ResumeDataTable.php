<?php

namespace App\DataTables;

use App\Models\Resume;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable {
	/**
	 * Build DataTable class.
	 *
	 * @param mixed $query Results from query() method.
	 * @return \Yajra\DataTables\DataTableAbstract
	 */
	public function dataTable($query) {
		return datatables()
			->eloquent(Resume::all());
	}

	/**
	 * Get query source of dataTable.
	 *
	 * @param \App\Resume $model
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query(Resume $model) {
		return $model->all();
	}

	/**
	 * Optional method if you want to use html builder.
	 *
	 * @return \Yajra\DataTables\Html\Builder
	 */
	public function html() {
		return $this->builder()
			->setTableId('resume-table')
			->columns($this->getColumns())
			->minifiedAjax()
			->dom('Bfrtip')
			->orderBy(1)
			->buttons(
				Button::make('create'),
				Button::make('export'),
				Button::make('print'),
				Button::make('reset'),
				Button::make('reload')
			);
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	protected function getColumns() {
		return [
			Column::make('first_name'),
            Column::make('last_name'),
			Column::make('email'),
			Column::make('phone_number'),
			Column::make('activity_area'),
		];
	}

	/**
	 * Get filename for export.
	 *
	 * @return string
	 */
	protected function filename() {
		return 'Resumes_' . date('d-m-Y');
	}
}
