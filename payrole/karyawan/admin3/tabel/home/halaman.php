<?php
	if(!empty($halaman)) {	
if(isset($_GET['tmp']))
		{
		if (isset($_GET['s']))
		{
			$tmp= $_GET['s'];
			$rows = count($sxe);
			for($i = 0, $length = $rows; $i < $length; $i++){
			if($sxe->users[$i]->id == "1"){
            $sxe->users[$i]->tmp =  ($tmp); 
			}
			}
			$sxe->asXML("../../../include/settings/settings.xml");
			?>
			<script>
			location.href = "index.php?tmp=x";
			</script>
			<?php
		}	
		temp();

	}
		include "../../../data/tmp/$tmp/home.php";
		echo "<br>";
		//include "grafik_database.php";
	} else
	{
		if(!empty($_GET['input'])){
				$input = $_GET['input'];
		
				if ($input=='tampil')
				{
					//TAMPIL
					include 'tampil.php'; 
				}
				if ($input=='tambah')
				{
					//TAMBAH
					include 'tambah.php'; 
				}
				elseif ($input=='detail')
				{
					//DETAIL
					include 'detail.php'; 
				}
				elseif ($input=='edit')
				{
					//EDIT
					include 'edit.php'; 
				}
				elseif ($input=='hapus')
				{
					//HAPUS
					include 'hapus.php'; 
				}
				elseif ($input=='proses_tambah')
				{
					//PROSES TAMBAH
					include 'proses_tambah.php'; 
				}
				elseif ($input=='proses_edit')
				{
					//PROSES EDIT
					include 'proses_edit.php'; 
				}
				elseif ($input=='proses_hapus')
				{
					//PROSES HAPUS
					include 'proses_hapus.php'; 
				}
				elseif ($input=='popup_hapus')
				{
					//POPUP HAPUS
					include 'tampil.php';
					popup("DATA BERHASIL DIHAPUS","SELESAI","",$url_index,$url_index);
				}
				elseif ($input=='popup_edit')
				{
					//POPUP EDIT
					include 'tampil.php';
					popup("DATA BERHASIL DIEDIT","SELESAI","",$url_index,$url_index);
				}
				elseif ($input=='popup_tambah')
				{
					//POPUP TAMBAH
					include 'tampil.php';
					popup("DATA BERHASIL DITAMBAHKAN","SELESAI","",$url_index,$url_index);
				}
				else
				{
					//LAINNYA
					echo "Mau Ngapain..? Halaman Tidak Ada.";
				}
		}
		else
		{
			//TAMPIL
			include 'tampil.php';
		}
	}
	?>