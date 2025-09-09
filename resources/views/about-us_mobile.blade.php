<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Churros - About Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app-B_-z85ZJ.css') }}">
    
</head>
<body class="bg-maroon-dark font-poppins text-gray-800">
    <div>
        <!-- Main Content -->
        <main class="p-6 md:p-10">
            <div class="container mx-auto">
                
                <!-- Kenapa Lunalur? Section -->
                <section id="kenapa-lunalur" class="mb-12">
                    <div class="max-w-4xl mx-auto">
                        <h2 class="text-3xl font-bold text-center mb-8" style="color: #F6AE45;">Kenapa Lunalur?</h2>
                        <div class="text-white text-lg text-center">
                            <p class="mb-4">
                                Diambil dari kata "Luna" yang berarti bulan melambangkan ketenangan, dan "alur" yang melambangkan aliran yang bergerak dengan harmonis. Produk kami memberikan pengalaman yang tenang dan harmoni sehingga cocok untuk dirasakan bersama-sama.
                            </p>
                            <p class="mb-4">
                                Berawal dari kecintaan kami terhadap makanan penutup yang lezat dan unik, kami memutuskan untuk membawa kelezatan churros ke tengah-tengah masyarakat Banjarnegara. Setiap churros yang kami buat menggunakan bahan-bahan pilihan dan resep rahasia keluarga yang telah disempurnakan dari generasi ke generasi.
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Kenapa Churros? Section -->
                <section id="kenapa-churros" class="mb-12">
                    <div class="max-w-4xl mx-auto">
                        <h2 class="text-3xl font-bold text-center mb-8" style="color: #F6AE45;">Kenapa Churros?</h2>
                        <div class="text-white text-lg text-center">
                            <p class="mb-4">
                                Dilihat dari banyaknya penjual makanan ringan di sekitar kota Banjarnegara, jarang sekali kami melihat adanya penjual churros. Jajanan churros yang sangat sederhana membuat kami berani untuk bereksperimen dengan produk churros kami dan membuat produk-produk unik yang sebelumnya belum pernah ada di Banjarnegara.
                            </p>
                            <p>
                                Terima kasih telah memilih Lunalur Churros. Kami berharap dapat menyajikan kebahagiaan dalam setiap gigitan!
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Anggota Section -->
                <section id="anggota" class="mb-12">
                    <div class="max-w-6xl mx-auto">
                        <h2 class="text-3xl font-bold text-center mb-8" style="color: #F6AE45;">Admin</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                            <!-- Member Card 1 -->
                            <div class="bg-base-white rounded-lg shadow-lg p-6 text-center">
                                <img src="{{ asset('images/Tegar.jpg') }}" alt="Tegar Rahman Nurraihan" class="w-32 h-32 object-cover mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-bold text-maroon-dark">Tegar Rahman Nurraihan</h3>
                                <a href= https://instagram.com/caveman_tegar target="_blank" class="text-gray-600">@caveman_tegar</a>
                            </div>
                            <!-- Member Card 2 -->
                            <div class="bg-base-white rounded-lg shadow-lg p-6 text-center">
                                <img src="{{ asset('images/Iklil.jpg') }}" alt="Iklil Fuhaid Athar" class="w-32 h-32 object-cover mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-bold text-maroon-dark">Iklil Fuhaid Athar</h3>
                                <a href= https://instagram.com/lili_renm target="_blank" class="text-gray-600">@lili_renm</a>
                            </div>
                            <!-- Member Card 3 -->
                            <div class="bg-base-white rounded-lg shadow-lg p-6 text-center">
                                <img src="{{ asset('images/Hananiah.jpg') }}" alt="Hananiah Mulki Acintya Qushoyyi" class="w-32 h-32 object-cover mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-bold text-maroon-dark">Hananiah Mulki Acintya Qushoyyi</h3>
                                <a href= https://instagram.com/stirnov_hana17 target="_blank" class="text-gray-600">@stirnov_hana17</a>
                            </div>
                            <!-- Member Card 4 -->
                            <div class="bg-base-white rounded-lg shadow-lg p-6 text-center">
                                <img src="{{ asset('images/Febryan.jpg') }}" alt="Febryan Nur Hidayatulloh" class="w-32 h-32 object-cover mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-bold text-maroon-dark">Febryan Nur Hidayatulloh</h3>
                                <a href= https://instagram.com/XPROJECT08 target="_blank" class="text-gray-600">@XPROJECT08</a>
                            </div>
                            <!-- Member Card 5 -->
                            <div class="bg-base-white rounded-lg shadow-lg p-6 text-center">
                                <img src="{{ asset('images/Aulia.jpg') }}" alt="Aulia Syifa Zulfiana" class="w-32 h-32 object-cover mx-auto rounded-full mb-4">
                                <h3 class="text-xl font-bold text-maroon-dark">Aulia Syifa Zulfiana</h3>
                                <a href= https://instagram.com/mikaa_lynx target="_blank" class="text-gray-600">@mikaa_lynx</a>
                            </div>
                        </div>
                    </div>
                </section>

                <footer class="text-center mt-12">
                    <a href="{{ route('home') }}" class="bg-maroon-accent hover:bg-opacity-90 text-white font-bold py-3 px-8 rounded-full transition-colors duration-300 text-lg">
                        Kembali
                    </a>
                </footer>
            </div>
        </main>
    </div>
</body>
</html>
