<?php

namespace App\Support\Exports;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SimpleExcel\SimpleExcelWriter;

class TableExporter
{
    /** 
     *
     * @param  Builder      $query
     * @param  string       $fileName
     * @param  array        $columns
     * @param  array|null   $headings
     * @param  callable|null $mapper
     * @param  string       $format
     */
    public static function export(
        Builder $query,
        string $fileName,
        array $columns,
        ?array $headings = null,
        ?callable $mapper = null,
        string $format = 'xlsx'
    ) {
        $rows = $query->get()->map(function ($model) use ($columns, $mapper) {
            if ($mapper) {
                return $mapper($model);
            }
            return collect($columns)
                ->map(fn ($col) => data_get($model, $col))
                ->all();
        })->all();

        $writer = SimpleExcelWriter::streamDownload("{$fileName}.{$format}");

        $writer->addRow(($headings ?? $columns));

        $writer->addRows($rows);

        return $writer->toBrowser();
    }
}
