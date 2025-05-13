<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kapolda Sumbar Taekwondo National Championship 2025</title>
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #1d3557;
            --accent-color: #457b9d;
            --light-color: #f1faee;
            --dark-color: #1d3557;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        header {
            position: relative;
        }

        .header-content {
            position: relative;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            position: relative;
        }

        .return-link {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .hero-image {
            width: 100%;
            height: 250px;
            background: url('{{ asset("images/banner.jpeg") }}') center/cover no-repeat;
            margin-bottom: 20px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0; /* Corrected from right: 0; */
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        h2 {
            font-size: 1.8rem;
            color: var(--secondary-color);
            margin: 1.5rem 0 1rem;
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 0.5rem;
            display: inline-block;
        }
        
        h3 {
            font-size: 1.4rem;
            color: var(--primary-color);
            margin: 1rem 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        
        .intro {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .event-details {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .detail-card {
            flex: 1 1 300px;
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .detail-card:hover {
            transform: translateY(-5px);
        }
        
        .icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .categories {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .category-card {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-left: 4px solid var(--accent-color);
        }
        
        .weight-classes {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow-x: auto;
        }
        
        .table-container {
            overflow-x: auto;
            margin-top: 1.5rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        th, td {
            padding: 0.75rem;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: var(--secondary-color);
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .registration {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .registration-details {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .fee-card {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .fee-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-color);
            margin: 1rem 0;
        }
        
        .awards {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .awards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        
        .award-card {
            background-color: var(--light-color);
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-top: 4px solid var(--primary-color);
        }
        
        .award-card h4 {
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }
        
        .award-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: goldenrod;
        }
        
        .regulations {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .regulations ul, .requirements ul {
            list-style-type: none;
            margin-top: 1rem;
        }
        
        .regulations li, .requirements li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-left: 1.5rem;
        }
        
        .regulations li:before, .requirements li:before {
            content: "•";
            color: var(--primary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        .requirements {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }
        
        .contact-info {
            margin-top: 1rem;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 1rem;
        }
        
        .btn:hover {
            background-color: #c1121f;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            h3 {
                font-size: 1.2rem;
            }
            
            .event-details, .category-grid, .registration-details, .awards-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <a href="{{ url('/') }}" class="return-link text-gray-900 hover:underline">Kembali ke Halaman Utama</a>
    <header>
        <div class="header-content">
            <div class="container">
                <div class="hero-image">
                    <div class="hero-overlay">
                        <h1>Kapolda Sumbar Taekwondo National Championship 2025</h1>
                        <p>Kyrougi - Poomsae | Pemula - Semi Prestasi - Prestasi | Pra Cadet - Cadet - Junior - Senior</p>
                    </div>
                </div>
            </div>    
        </div>
    </header>
    
    <div class="container">
        <section class="intro">
            <h2>Tentang Kejuaraan</h2>
            <p>Kapolda Sumbar Taekwondo National Championship 2025 adalah kejuaraan taekwondo tingkat nasional yang diselenggarakan untuk menyambut HUT POLRI ke 79 tahun 2025. Kejuaraan ini bertujuan untuk mengevaluasi hasil pembinaan olahraga dan seni yang dilakukan oleh Sekolah, Dojang dan Club di Sumbar dan di luar Sumbar serta menjadi sarana pemandu bakat olahraga bagi siswa/atlit yang berbakat.</p>
            <p><strong>Tema:</strong> "OLAH RAGA EDUKATIF DALAM PENGEMBANGAN KARAKTER ATLIT TAEKWONDO SUMATERA BARAT DALAM MENGHADAPI ZAMAN MILENIAL DEMI KEMAJUAN PRESTASI"</p>
            <p><strong>Slogan:</strong> NO ZERO TAWURAN DAN NO ZERO NARKOBA</p>
        </section>
        
        <section class="event-details">
            <div class="detail-card">
                <div class="icon">📅</div>
                <h3>Tanggal Pelaksanaan</h3>
                <p>20, 21, 22 Juni 2025</p>
                <p><strong>Technical Meeting:</strong> Kamis, 19 Juni 2025 (15.00 WIB)</p>
                <p><strong>Penimbangan:</strong> Kamis, 19 Juni 2025 (10.00 WIB)</p>
            </div>
            
            <div class="detail-card">
                <div class="icon">📍</div>
                <h3>Lokasi</h3>
                <p>GOR Universitas Negeri Padang (UNP)</p>
                <p>Sumatera Barat</p>
                <p><strong>Waktu:</strong> 08.00 WIB s/d Selesai</p>
            </div>
            
            <div class="detail-card">
                <div class="icon">👥</div>
                <h3>Peserta</h3>
                <p>Pra Cadet, Cadet, Junior dan Senior</p>
                <p><strong>Kuota:</strong> Maksimum 2000 Peserta</p>
                <p><strong>Kelompok Usia:</strong> Kelahiran 1998 - 2019</p>
            </div>
        </section>
        
        <section class="categories">
            <h2>Kategori Pertandingan</h2>
            <div class="category-grid">
                <div class="category-card">
                    <h3>Pra Cadet A (6-7 Tahun)</h3>
                    <p>Kelahiran 2019-2018</p>
                    <p>Tingkat: Pemula/Semi Prestasi</p>
                </div>
                
                <div class="category-card">
                    <h3>Pra Cadet B (8-9 Tahun)</h3>
                    <p>Kelahiran 2017-2016</p>
                    <p>Tingkat: Pemula/Semi Prestasi</p>
                </div>
                
                <div class="category-card">
                    <h3>Pra Cadet C (10-11 Tahun)</h3>
                    <p>Kelahiran 2015-2014</p>
                    <p>Tingkat: Semi Prestasi/Prestasi</p>
                </div>
                
                <div class="category-card">
                    <h3>Cadet (12-14 Tahun)</h3>
                    <p>Kelahiran 2013-2011</p>
                    <p>Tingkat: Semi Prestasi/Prestasi</p>
                </div>
                
                <div class="category-card">
                    <h3>Junior (15-17 Tahun)</h3>
                    <p>Kelahiran 2010-2008</p>
                    <p>Tingkat: Semi Prestasi/Prestasi</p>
                </div>
                
                <div class="category-card">
                    <h3>Senior (18-27 Tahun)</h3>
                    <p>Kelahiran 2007-1998</p>
                    <p>Tingkat: Semi Prestasi/Prestasi</p>
                </div>
            </div>
        </section>
        
        <section class="weight-classes">
            <h2>Kelas Kyrougi</h2>
            
            <h3>Pra Cadet A (6-7 Tahun) - Pemula/Semi Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 16 KG</td><td>Under 14 KG</td></tr>
                        <tr><td>2</td><td>Under 18 KG</td><td>Under 16 KG</td></tr>
                        <tr><td>3</td><td>Under 20 KG</td><td>Under 18 KG</td></tr>
                        <tr><td>4</td><td>Under 23 KG</td><td>Under 20 KG</td></tr>
                        <tr><td>5</td><td>Under 25 KG</td><td>Under 23 KG</td></tr>
                        <tr><td>6</td><td>Under 27 KG</td><td>Under 25 KG</td></tr>
                        <tr><td>7</td><td>Under 30 KG</td><td>Under 27 KG</td></tr>
                        <tr><td>8</td><td>Under 33 KG</td><td>Under 30 KG</td></tr>
                        <tr><td>9</td><td>Under 36 KG</td><td>Under 33 KG</td></tr>
                        <tr><td>10</td><td>Over 36 KG</td><td>Over 33 KG</td></tr>
                    </tbody>
                </table>
            </div>
            
            <h3>Pra Cadet B (8-9 Tahun) - Pemula/Semi Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 18 KG</td><td>Under 16 KG</td></tr>
                        <tr><td>2</td><td>Under 20 KG</td><td>Under 18 KG</td></tr>
                        <tr><td>3</td><td>Under 23 KG</td><td>Under 20 KG</td></tr>
                        <tr><td>4</td><td>Under 25 KG</td><td>Under 23 KG</td></tr>
                        <tr><td>5</td><td>Under 27 KG</td><td>Under 25 KG</td></tr>
                        <tr><td>6</td><td>Under 30 KG</td><td>Under 27 KG</td></tr>
                        <tr><td>7</td><td>Under 33 KG</td><td>Under 30 KG</td></tr>
                        <tr><td>8</td><td>Under 36 KG</td><td>Under 33 KG</td></tr>
                        <tr><td>9</td><td>Under 39 KG</td><td>Under 36 KG</td></tr>
                        <tr><td>10</td><td>Over 39 KG</td><td>Over 36 KG</td></tr>
                    </tbody>
                </table>
            </div>
            
            <h3>Pra Cadet C (10-11 Tahun) - Semi Prestasi/Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 24 KG</td><td>Under 22 KG</td></tr>
                        <tr><td>2</td><td>Under 26 KG</td><td>Under 24 KG</td></tr>
                        <tr><td>3</td><td>Under 28 KG</td><td>Under 26 KG</td></tr>
                        <tr><td>4</td><td>Under 31 KG</td><td>Under 29 KG</td></tr>
                        <tr><td>5</td><td>Under 34 KG</td><td>Under 32 KG</td></tr>
                        <tr><td>6</td><td>Under 37 KG</td><td>Under 35 KG</td></tr>
                        <tr><td>7</td><td>Under 40 KG</td><td>Under 38 KG</td></tr>
                        <tr><td>8</td><td>Under 43 KG</td><td>Under 41 KG</td></tr>
                        <tr><td>9</td><td>Under 46 KG</td><td>Under 44 KG</td></tr>
                        <tr><td>10</td><td>Over 46 KG</td><td>Over 44 KG</td></tr>
                    </tbody>
                </table>
            </div>
            
            <h3>Cadet (12-14 Tahun) - Semi Prestasi/Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 33 KG</td><td>Under 29 KG</td></tr>
                        <tr><td>2</td><td>Under 37 KG</td><td>Under 33 KG</td></tr>
                        <tr><td>3</td><td>Under 41 KG</td><td>Under 37 KG</td></tr>
                        <tr><td>4</td><td>Under 45 KG</td><td>Under 41 KG</td></tr>
                        <tr><td>5</td><td>Under 49 KG</td><td>Under 44 KG</td></tr>
                        <tr><td>6</td><td>Under 53 KG</td><td>Under 47 KG</td></tr>
                        <tr><td>7</td><td>Under 57 KG</td><td>Under 51 KG</td></tr>
                        <tr><td>8</td><td>Under 61 KG</td><td>Under 55 KG</td></tr>
                        <tr><td>9</td><td>Under 65 KG</td><td>Under 59 KG</td></tr>
                        <tr><td>10</td><td>Over 65 KG</td><td>Over 59 KG</td></tr>
                    </tbody>
                </table>
            </div>
            
            <h3>Junior (15-17 Tahun) - Semi Prestasi/Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 45 KG</td><td>Under 42 KG</td></tr>
                        <tr><td>2</td><td>Under 48 KG</td><td>Under 44 KG</td></tr>
                        <tr><td>3</td><td>Under 51 KG</td><td>Under 46 KG</td></tr>
                        <tr><td>4</td><td>Under 55 KG</td><td>Under 49 KG</td></tr>
                        <tr><td>5</td><td>Under 59 KG</td><td>Under 52 KG</td></tr>
                        <tr><td>6</td><td>Under 63 KG</td><td>Under 55 KG</td></tr>
                        <tr><td>7</td><td>Under 67 KG</td><td>Under 59 KG</td></tr>
                        <tr><td>8</td><td>Under 73 KG</td><td>Under 63 KG</td></tr>
                        <tr><td>9</td><td>Under 78 KG</td><td>Under 68 KG</td></tr>
                        <tr><td>10</td><td>Over 78 KG</td><td>Over 68 KG</td></tr>
                    </tbody>
                </table>
            </div>
            
            <h3>Senior (18-27 Tahun) - Semi Prestasi/Prestasi</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Putra</th>
                            <th>Putri</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Under 54 KG</td><td>Under 46 KG</td></tr>
                        <tr><td>2</td><td>Under 58 KG</td><td>Under 49 KG</td></tr>
                        <tr><td>3</td><td>Under 63 KG</td><td>Under 53 KG</td></tr>
                        <tr><td>4</td><td>Under 68 KG</td><td>Under 57 KG</td></tr>
                        <tr><td>5</td><td>Under 74 KG</td><td>Under 62 KG</td></tr>
                        <tr><td>6</td><td>Under 80 KG</td><td>Under 67 KG</td></tr>
                        <tr><td>7</td><td>Under 87 KG</td><td>Under 73 KG</td></tr>
                        <tr><td>8</td><td>Over 87 KG</td><td>Over 73 KG</td></tr>
                    </tbody>
                </table>
            </div>
        </section>
        
        <section class="categories">
            <h2>Kelas Poomsae</h2>
            <div class="category-grid">
                <div class="category-card">
                    <h3>Poomsae Individual</h3>
                    <p>Kategori: Pemula/Semi Prestasi dan Prestasi</p>
                    <p>Penilaian: Point Tertinggi (Pemula/Semi Prestasi), Babak Penyisihan dan Final (Prestasi)</p>
                </div>
                
                <div class="category-card">
                    <h3>Poomsae Pair</h3>
                    <p>Kategori: Pemula/Semi Prestasi dan Prestasi</p>
                    <p>Penilaian: Point Tertinggi (Pemula/Semi Prestasi), Babak Penyisihan dan Final (Prestasi)</p>
                </div>
                
                <div class="category-card">
                    <h3>Poomsae Beregu</h3>
                    <p>Kategori: Pemula/Semi Prestasi dan Prestasi</p>
                    <p>Penilaian: Point Tertinggi (Pemula/Semi Prestasi), Babak Penyisihan dan Final (Prestasi)</p>
                </div>
                
                <div class="category-card">
                    <h3>Poomsae Freestyle</h3>
                    <p>Kategori: Individual, Pair, Beregu</p>
                    <p>Kelompok Usia: Pra Cadet C, Cadet, Junior, Senior</p>
                    <p>Tingkat: Semi Prestasi/Freestyle</p>
                </div>
            </div>
        </section>
        
        <section class="registration">
            <h2>Pendaftaran</h2>
            <p>Pendaftaran dilaksanakan mulai tanggal <strong>17 Maret 2025 s/d 1 Juni 2025</strong>.</p>
            <p>Data Berkas Keabsahan Atlit dikirim sampai dengan tanggal <strong>8 Juni 2025</strong>.</p>
            <p>Pembayaran dilakukan dan ditransfer dengan bukti pada tanggal <strong>1 Juni 2025</strong>.</p>
            
            <h3>Biaya Pendaftaran</h3>
            <div class="registration-details">
                <div class="fee-card">
                    <h4>Kyrougi</h4>
                    <div class="fee-price">Rp 450.000</div>
                    <p>Per Atlit</p>
                </div>
                
                <div class="fee-card">
                    <h4>Poomsae Individual</h4>
                    <div class="fee-price">Rp 450.000</div>
                    <p>Per Atlit</p>
                </div>
                
                <div class="fee-card">
                    <h4>Poomsae Pair</h4>
                    <div class="fee-price">Rp 550.000</div>
                    <p>Per Pasangan</p>
                </div>
                
                <div class="fee-card">
                    <h4>Poomsae Beregu</h4>
                    <div class="fee-price">Rp 650.000</div>
                    <p>Per Regu</p>
                </div>
                
                <div class="fee-card">
                    <h4>Per Team</h4>
                    <div class="fee-price">Rp 300.000</div>
                    <p>Per Team</p>
                </div>
            </div>
            
            <h3>Rekening Pembayaran</h3>
            <p>Bank Mandiri: <strong>1110020719148</strong></p>
            <p>Atas Nama: <strong>Omil Charmyn Chatib</strong></p>
            
            <h3>Kontak Informasi Pendaftaran</h3>
            <div class="contact-info">
                <p>Sbm Omil: <strong>0812 6796 622</strong></p>
                <p>Sbm Yudha: <strong>0811 1111 465</strong></p>
                <p>Sbm Eka: <strong>0813 7449 7222</strong></p>
            </div>
            
        </section>
        
        <section class="requirements">
            <h2>Persyaratan Peserta</h2>
            <div class="category-grid">
                <div class="category-card">
                    <h3>Persyaratan Kontingen</h3>
                    <ul>
                        <li>Tidak pernah terlibat dengan kegiatan taekwondo diluar organisasi PBTI, Pengprov TI, dan Pengkab/Pengkot TI</li>
                        <li>Surat Tugas/Rekomendasi dari Pengprov, Pengkot, Pengkab</li>
                        <li>Setiap Kontingen dan Atlit bertanggung jawab terhadap ketertiban supporter atau pendukungnya</li>
                        <li>Pelatih yang mendampingi atlit minimal memiliki sertifikat Pelatihan Pelatih</li>
                        <li>Coach diwajibkan Berpakaian Rapi saat mendampingi Atlit (Baju kaos berkerah, Celana panjang/training dan sepatu)</li>
                        <li>Mengisi dan mengirimkan Formulir Kesediaan Kontingen</li>
                    </ul>
                </div>
                
                <div class="category-card">
                    <h3>Persyaratan Atlit</h3>
                    <ul>
                        <li>Atlit maksimal kelahiran 1998</li>
                        <li>Surat Berbadan Sehat dari dokter</li>
                        <li>Fotocopy Sertifikat PBTI dan asli diperlihatkan</li>
                        <li>Membawa Foto Copy Akte Kelahiran serta aslinya</li>
                        <li>Mendapat izin tertulis pada form yang telah disediakan yang akan ditanda tangani diatas materai Rp.10.000.-, oleh orang Tua / Wali</li>
                        <li>Menyerahkan Pas Foto Atlit, Pelatih, Official ukuran 3 x 4 = 2 Lembar</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section class="regulations">
            <h2>Peraturan Pertandingan</h2>
            <ul>
                <li>Peraturan pertandingan menggunakan peraturan terbaru yang mengacu kepada "Competition Rules dari World Taekwondo Federation"</li>
                <li>Pertandingan memakai System (DSS) dan (PSS)</li>
                <li>Kelas-kelas yang diikuti oleh 3 atau 2 orang atlit/kelasnya ALL Tingkat hanya dipertandingkan sebagai eksebisi, tidak diperhitungkan dalam perolehan medali</li>
                <li>Setiap Atlit wajib membawa dan menyediakan perlengkapan pertandingan Head Protector, Body protector, Pelindung Kemaluan(sincia), Pelindung Tangan, Pelindung Kaki, Pelindung Gigi</li>
                <li>Medali diperhitungan jika peserta berjumlah 4 orang</li>
                <li>Keputusan Wasit Pertandingan Mutlak</li>
                <li>Pertandingan/Pemenang menggunakan system Medali tertinggi</li>
            </ul>
            
            <h3>Atlit Pemula</h3>
            <p>Map Plastik Hijau - 1 Group isinya 2 atlit (Emas + Perak)</p>
            
            <h3>Atlit Semi Prestasi</h3>
            <p>Map Plastik Kuning - 1 Group isinya 4 atau 3 Atlit (Emas, Perak, Perunggu, Perunggu)</p>
            
            <h3>Atlit Prestasi</h3>
            <p>Map Plastik Merah - 1 Group isinya 4 Atlit lebih (Emas, Perak, Perunggu, Perunggu)</p>
        </section>
        
        <section class="awards">
            <h2>Penghargaan</h2>
            <div class="awards-grid">
                <div class="award-card">
                    <div class="award-icon">🏆</div>
                    <h4>Medali Juara</h4>
                    <p>Juara 1: Medali Emas</p>
                    <p>Juara 2: Medali Perak</p>
                    <p>Juara 3: Medali Perunggu (2 orang)</p>
                </div>
                
                <div class="award-card">
                    <div class="award-icon">🥇</div>
                    <h4>Juara Umum</h4>
                    <p>Juara Umum 1 Prestasi: Piala + Uang Pembinaan</p>
                    <p>Juara Umum 2 Prestasi: Piala + Uang Pembinaan</p>
                    <p>Juara Umum 3 Prestasi: Piala + Uang Pembinaan</p>
                    <p><small>*Juara Umum dihitung Kelas Junior dan Senior Prestasi</small></p>
                </div>
                
                <div class="award-card">
                    <div class="award-icon">🏅</div>
                    <h4>Juara Per Kategori</h4>
                    <p>Juara 1, 2, 3 Senior Prestasi</p>
                    <p>Juara 1, 2, 3 Junior Prestasi</p>
                    <p>Juara 1, 2, 3 Cadet Prestasi</p>
                    <p>Juara 1, 2, 3 Semi Prestasi</p>
                    <p><small>*Masing-masing memperoleh Piala</small></p>
                </div>
                
                <div class="award-card">
                    <div class="award-icon">🎖️</div>
                    <h4>Piala Spesial</h4>
                    <p>Piala Atlit Terbaik Putra/Putri Prestasi Senior</p>
                    <p>Piala Atlit Terbaik Putri/Putri Prestasi Junior</p>
                    <p>Piala Atlit Terbaik Putra/Putri Prestasi Cadet</p>
                    <p>Piala Wasit Terbaik</p>
                    <p>Piala Team Favorit</p>
                </div>
                
                <div class="award-card">
                    <div class="award-icon">📜</div>
                    <h4>Sertifikat</h4>
                    <p>Setiap Manager, Coach, Official, Atlit mendapatkan sertifikat dan ID Card</p>
                    <p>Panitia mendapatkan ID Card</p>
                </div>
                
                <div class="award-card">
                    <div class="award-icon">🎁</div>
                    <h4>Bonus</h4>
                    <p>Hadiah Doorprize untuk setiap hari kejuaraan</p>
                </div>
            </div>
        </section>
        
        <section class="regulations">
            <h2>Sanksi dan Diskualifikasi</h2>
            <ul>
                <li>Keterlambatan Pendaftaran dan ketidak lengkapan berkas yang diminta, serta keabsahan berkas tidak sah akan dikenakan sanksi diskualifikasi yang merupakan tanggung jawab serta konsekwensi masing-masing kontingen</li>
                <li>Apabila peserta yang telah terdaftar tidak melakukan penimbangan berat badan pada waktu yang telah ditentukan, maka dianggap diskualifikasi</li>
                <li>Apabila terjadi Protes diharus Membayar Rp. 2.500.000.-, Ketika terjadi yang berlebihan atau sifatnya Mengganggu Sistem Pertandingan dianggap melakukan Pelanggaran dan Diskualifikasi</li>
            </ul>
            
            <h3>Aturan Pemanggilan</h3>
            <ul>
                <li><strong>Pemanggilan 1:</strong> Coach mempersiapkan atlitnya</li>
                <li><strong>Pemanggilan 2:</strong> Atlit sudah harus hadir untuk diperiksa kelengkapannya oleh Inpection Desk</li>
                <li><strong>Pemanggilan 3:</strong> Atlit sudah memasuki arena pertandingan</li>
                <li><strong>Keshi 1 Menit:</strong> Kalau atlit tidak juga masuk di Arena Pertandingan dalam jangka waktu 1 menit, maka sang atlit kena Diskualifikasi.</li>
            </ul>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <h2>KAPOLDA SUMBAR TAEKWONDO NATIONAL CHAMPIONSHIP 2025</h2>
            <p>Dipersembahkan oleh:</p>
            <p><strong>KOMBES POL ERWIN SUWONDO, S.IK, M.IK</strong></p>
            <div class="contact-info">
                <p>Untuk informasi lebih lanjut, silahkan hubungi:</p>
                <p>Sbm Omil: <strong>0812 6796 622</strong></p>
                <p>Sbm Yudha: <strong>0811 1111 465</strong></p>
                <p>Sbm Eka: <strong>0813 7449 7222</strong></p>
            </div>
            <p>&copy; 2025 Kapolda Sumbar Taekwondo National Championship. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>