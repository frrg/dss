<?php


function tanggalFormat($nilai)
{
	return date('d-M-Y', strtotime($nilai));
}

function tanggalWaktuFormat($nilai)
{
	return date('d F Y H:i:s', strtotime($nilai));
}
