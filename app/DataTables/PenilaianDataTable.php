<?php

namespace App\DataTables;

use App\Models\KriteriaM;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;

class PenilaianDataTable extends DataTable
{
    protected function url()
    {
        return route('penilaian.ajaxtable');
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $datatables = datatables()->eloquent($query);
        $kriterium = KriteriaM::all();
        foreach($kriterium as $kriteria){
            $datatables->addColumn(Str::slug($kriteria->kriteria_keterangan,'_'),function($val)use($kriteria){
                $penilaian = $val->penilaian()->where('kriteria_id',$kriteria->id);
            if(!is_null($bobot =$penilaian->first())){
            return $bobot->bobot_kriteria->bobot;
            }else{
                return "-";
            }
            
        });
    }
    
        return $datatables
            // ->eloquent($query)
            ->addIndexColumn()
            ->editColumn('created_at',function($val){
                return tanggalWaktuFormat($val->created_at);
            })
            ->addColumn('action', function ($val) {
                if($val->penilaian->isEmpty()){
                    $hasNilai = false;
                }else{
                    $hasNilai = true;
                }
                return view(
                    'dashboard.penilaian._action',
                    [
                        'id' => $val->id,
                        'hasNilai' => $hasNilai,
                    ]
                );
            })
            ->toJson();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Penilaian $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Penilaian $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
       
        // dd($additional);
        return $this->builder()
            ->setTableId('penilaian-table')
            ->addTableClass('table-hover table-striped table-sm table-bordered')
            ->columns($this->getColumns())
            ->minifiedAjax($this->url(), null, [
                'term'   => "function(){ return $('input#term').val(); }",
            ])
            ->parameters([
                'pageLength' => 5,
                'paging'     => true,
                'processing' => true,
                'serverSide' => true,
                'responsive' => true,
                'dom'        => '<t<p >>',
                'destroy'   => true,
                'autoWidth' => false,
                'language' => [
                    'lengthMenu' => '_MENU_',
                    'info' => 'Menampilkan <b>_START_ sampai _END_</b> dari _TOTAL_ data',
                    'zeroRecords' => 'Tidak ada data',
                    'emptyTable' => 'Data tidak tersedia',
                    'loadingRecords' => 'Loading...',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $additional = [];
        $kriterium = KriteriaM::all();
        foreach($kriterium as $index => $kriteria){
            $additional[] = Column::make(Str::slug($kriteria->kriteria_keterangan,'_'))->title($kriteria->kriteria_keterangan);
        }

        return [...[
            Column::computed('DT_RowIndex')->searchable(false)->title('#'),
            Column::make('pelamar_nama')->title('NAMA'),
            Column::make('pelamar_alamat')->title('ALAMAT'),
        ], ...$additional, ...[
            Column::make('created_at')->title('DIBUAT'),
            Column::computed('action')
                ->title('AKSI')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center text-nowrap'),
    ]];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Penilaian_' . date('YmdHis');
    }
}
