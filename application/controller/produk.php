
<?php

$diskon = 10;

//VARIABEL $diskon berisi nilai integer 10 // tipe data integer = 1
$data_produk = array(
    array(
        'gambar' => 'produk-1.jpg',
        'judul' => 'Produk 1',
        'harga' => 400000,
        'stok' => 4,
        'keterangan' => 'Pakaian Bagus', 
        
    ),
    array(
        'gambar' => 'produk-2.jpg',
        'judul' => 'Produk 2',
        'harga' => 800000,
        'stok' => 4,
        'keterangan' => 'Pakaian Bagus', 
        
    ),
    array(
        'gambar' => 'produk-3.jpg',
        'judul' => 'Produk 3',
        'harga' => 900000,
        'stok' => 4,
        'keterangan' => 'Pakaian Bagus', 
        
    ),
    array(
        'gambar' => 'produk-4.jpg',
        'judul' => 'Produk 4',
        'harga' => 600000,
        'stok' => 0,
        'keterangan' => 'Pakaian Bagus', 
        
    ),
    array(
        'gambar' => 'produk-5.jpg',
        'judul' => 'Produk 5',
        'harga' => 350000,
        'stok' => 4,
        'keterangan' => 'Pakaian Bagus', 
        
    ),
);


$cuy_vila = array(
    array(
        "image" => "villa-1.jpg", 
        "bedrooms" => 1,
        "guests" => 2,
        "title" => "1 Bedroom Villas",
        "price" => 1800000,
        "keterangan" => "1 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services"
        // "price" => "IDR 1,000,000/Night"
    ),
    array(
        "image" => "villa-2.jpg", 
        "bedrooms" => 2,
        "guests" => 4,
        "title" => "2 Bedroom Villas",
        "price" => 2800000,
        "keterangan" => "2 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services"
        // "price" => "IDR 1,000,000/Night"
    ),
    array(
        "image" => "villa-3.jpg", 
        "bedrooms" => 3,
        "guests" => 6,
        "title" => "3 Bedroom Villas",
        "price" => 3800000,
        "keterangan" => "3 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services"
        // "price" => "IDR 1,000,000/Night"
    ),
    array(
        "image" => "villa-4.jpg", 
        "bedrooms" => 4,
        "guests" => 8,
        "title" => "4 Bedroom Villas",
        "price" => 4800000,
        "keterangan" => "4 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services"
        // "price" => "IDR 1,000,000/Night"
    ),
    array(
        "image" => "villa-4.jpg", 
        "bedrooms" => 4,
        "guests" => 8,
        "title" => "4 Bedroom Villas",
        "price" => 10000,
        "keterangan" => "1 Bedroom Villas in Legian, Bali can be an incredible choice for newlywed couples and solo travelers. With 24-hour desk services"
        // "price" => "IDR 1,000,000/Night"
    ),
);

// fungsi 1
function read_more($keterangan){
    // kalau bisa kondisi if
    return substr($keterangan, 0, 200) .' ...';//substr artinya uhtuk memotong
}


// function data_diri($nama,$email){
//     echo "Halo ". $nama . " saya ingin memesan ";
//     echo ""
// }




// function data_pribadi($nama, $no_telepon,)



// <?php

// $rooms = [
//     [
//         "image" => "images/villa-1.jpg", /
//         "bedrooms" => 1,
//         "guests" => 2,
//         "extra_bed_price" => 500000,
//         "title" => "1 Bedroom Villas",
//         "price" => "IDR 1,000,000/Night"
//     ],
//     [
//         "image" => "images/villa-2.jpg",
//         "bedrooms" => 2,
//         "guests" => 4,
//         "extra_bed_price" => 600000,
//         "title" => "2 Bedroom Villas",
//         "price" => 2000000."/Night"
//     ],

// ];
// ?>
