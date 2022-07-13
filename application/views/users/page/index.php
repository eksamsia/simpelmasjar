<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simpelmasjar landing page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
	--primary-color: -webkit-linear-gradient(left, #a445b2, #d41872, #fa4299);
	--dark-color: #141414;
	--light-color: #f4f4f4;
	--second-color: #d41872;
}

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: 'Arial', sans-serif;
	-webkit-font-smoothing: antialiased;
	background: #000;
	color: #999;
}

ul {
	list-style: none;
}

h1,
h2,
h3,
h4 {
	color: #fff;
	/* margin-top: auto; */
}

a {
	color: #fff;
	text-decoration: none;
}

p {
	margin: 2rem 0;
}

img {
	width: 100%;
}

.showcase {
	width: 100%;
	height: 93vh;
	position: relative;
	background: url(https://img.freepik.com/free-vector/hand-drawn-flat-case-study-illustration_52683-70848.jpg?t=st=1657596082~exp=1657596682~hmac=4829877…&w=740) no-repeat center center/cover;
}

.showcase::after {
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
	background: rgba(0, 0, 0, 0.6);
	box-shadow: inset 120px 100px 250px #000000, inset -120px -100px 250px #000000;
}

.showcase-top {
	position: relative;
	z-index: 2;
	height: 90px;
}
.showcase-top-1 {
	margin-right: 145px;
	color: #999;
}
.showcase-top-1:hover{
	color: #fff;
}


.showcase-top a {
	position: absolute;
	top: 50%;
	right: 0;
	transform: translate(-50%, -50%);
}


.showcase-content {
	position: relative;
	z-index: 2;
	width: 65%;
	margin: auto;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	text-align: center;
	margin-top: 9rem;
}

.showcase-content h1 {
	font-weight: 700;
	font-size: 3.2rem;
	line-height: 1.1;
	margin: 0 0 2rem;
}

.showcase-content p {
	text-transform: uppercase;
	color: #fff;
	font-weight: 400;
	font-size: 1.9rem;
	line-height: 1.25;
	margin: 0 0 0.5rem;
}

.sbuttons {
	bottom: 5%;
	position: fixed;
	margin: 1em;
	left: 0;
}

.sbutton {
	display: block;
	width: 60px;
	height: 60px;
	border-radius: 50%;
	text-align: center;
	color: white;
	margin: 20px auto 0;
	box-shadow: 0px 5px 11px -2px rgba(0, 0, 0, 0.18), 0px 4px 12px -7px rgba(0, 0, 0, 0.15);
	cursor: pointer;
	-webkit-transition: all .1s ease-out;
	transition: all .1s ease-out;
	position: relative;
}

.sbutton>i {
	font-size: 38px;
	line-height: 60px;
	transition: all .2s ease-in-out;
	transition-delay: 2s;
}

.sbutton:active,
.sbutton:focus,
.sbutton:hover {
	box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}

.sbutton:not(:last-child) {
	width: 60px;
	height: 60px;
	margin: 20px auto 0;
	opacity: 0;
}

.sbutton:not(:last-child)>i {
	font-size: 25px;
	line-height: 60px;
	transition: all .3s ease-in-out;
}

.sbuttons:hover .sbutton:not(:last-child) {
	opacity: 1;
	width: 60px;
	height: 60px;
	margin: 15px auto 0;
}

.sbutton:nth-last-child(1) {
	-webkit-transition-delay: 25ms;
	transition-delay: 25ms;
}

.sbutton:not(:last-child):nth-last-child(2) {
	-webkit-transition-delay: 20ms;
	transition-delay: 20ms;
}

.sbutton:not(:last-child):nth-last-child(3) {
	-webkit-transition-delay: 40ms;
	transition-delay: 40ms;
}

.sbutton:not(:last-child):nth-last-child(4) {
	-webkit-transition-delay: 60ms;
	transition-delay: 60ms;
}

.sbutton:not(:last-child):nth-last-child(5) {
	-webkit-transition-delay: 80ms;
	transition-delay: 80ms;
}

.sbutton:not(:last-child):nth-last-child(6) {
	-webkit-transition-delay: 100ms;
	transition-delay: 100ms;
}

[tooltip]:before {
	font-family: 'Roboto';
	font-weight: 600;
	border-radius: 2px;
	background-color: #585858;
	color: #fff;
	content: attr(tooltip);
	font-size: 12px;
	visibility: hidden;
	opacity: 0;
	padding: 5px 7px;
	margin-left: 10px;
	position: absolute;
	left: 100%;
	bottom: 20%;
	white-space: nowrap;
}

[tooltip]:hover:before,
[tooltip]:hover:after {
	visibility: visible;
	opacity: 1;
}

.sbutton.mainsbutton {
	/* background: #2ab1ce; */
	background: -webkit-radial-gradient(left, rgb(69, 138, 178), #44b7d4, #0a93e2);;
}

.sbutton.phone {
	/* background: #3F51B5; */
	background:-webkit-radial-gradient(left, #7b7ad1, #181bd4, #9242fa); ;
}

.sbutton.email {
	/* background: #fc000d; */
	background: -webkit-radial-gradient(left, #eb3939, #d45318, #ff0404);
		;
}
/* Tabs */
.tabs {
	background: var(--dark-color);
	padding-top: 1rem;
	border-bottom: 3px solid #3d3d3d;
	border-right: none;
}

.tabs .container {
	display: grid;
	grid-template-columns: repeat(5, 1fr);
	grid-gap: 1rem;
	align-items: center;
	justify-content: center;
	text-align: center;
}

.tabs p {
	font-size: 1.2rem;
	padding-top: 0.5rem;
}

.tabs .container > div {
	padding: 1.5rem 0;
}

.tabs .container > div:hover {
	color: #fff;
	cursor: pointer;
}

.tab-border {
	border-bottom: var(--second-color) 4px solid;
}

/* Tab Content */
.tab-content {
	padding: 3rem 0;
	background: #000;
	color: #fff;
}

/* Hide initial content */
#tab-1-content,
#tab-2-content,
#tab-3-content,
#tab-4-content,
#tab-5-content,
#tab-6-content {
	display: none;
	opacity: 0;
}

.show {
	display: block !important;
	opacity: 1 !important;
	transition: all 1000 ease-in;
}

#tab-1-content .tab-1-content-inner {
	display: flex;
	grid-template-columns: repeat(2, 1fr);
	grid-gap: 2rem;
	align-items: center;
	justify-content: center;
}

#tab-2-content .tab-2-content-top {
	display: flex;
	grid-template-columns: 2fr 1fr;
	grid-gap: 1rem;
	justify-content: center;
	align-items: center;
}

.table {
	width: 100%;
	margin-top: 2rem;
	border-collapse: collapse;
	border-spacing: 0;
}

.table thead th {
	text-transform: uppercase;
	padding: 0.8rem;
}

.table tbody {
	display: table-row-group;
	vertical-align: middle;
	border-color: inherit;
}

.table tbody tr td {
	color: #fff;
	padding: 0.8rem 1.2rem;
	text-align: center;
}

.table tbody tr td:first-child {
	text-align: left;
}

.table tbody tr:nth-child(odd) {
	background: #222;
}

.footer {
	max-width: 70%;
	margin: 1rem auto;
	overflow: auto;
}


/* Container */
.container {
	max-width: 70%;
	margin: auto;
	overflow: hidden;
	padding: 0 2rem;
}

/* Text Styles */
.text-xl {
	font-size: 15px;
}

.text-lg {
	font-size: 1.8rem;
	margin-bottom: 1rem;
	color: #fff;
}

.text-md {
	margin-bottom: 1.5rem;
	font-size: 1.2rem;
}

.text-center {
	text-align: center;
	color: #fff;
}

.text-dark {
	color: #fff;
	text-align: center;
}

/* Buttons */
.btn {
	display: inline-block;
	background: var(--primary-color);
	color: #fff;
	padding: 0.4rem 1.3rem;
	font-size: 1rem;
	text-align: center;
	border: none;
	cursor: pointer;
	margin-right: 0.5rem;
	transition: opacity 0.2s ease-in;
	outline: none;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.45);
	border-radius: 5px;
}

.btn:hover {
	opacity: 0.9;
}

.btn-rounded {
	border-radius: 5px;
}

.btn-xl {
	font-size: 1.3rem;
	padding: 1.5rem 2.1rem;
	text-transform: uppercase;
	border-radius: 30px;
}

.btn-lg {
	font-size: 1rem;
	padding: 0.8rem 1.3rem;
	text-transform: uppercase;
}

.btn-icon {
	margin-left: 1rem;
}

@media (max-width: 960px) {

		.showcase {
		height: 70vh;
	}

	.hide-sm {
		display: none;
	}

	.showcase-top img {
		top: 30%;
		left: 5%;
		transform: translate(0);
	}

	.showcase-content h1 {
		font-size: 3.7rem;
		line-height: 1;
	}

	.showcase-content p {
		font-size: 1.5rem;
	}

	.footer .footer-cols {
		grid-template-columns: repeat(2, 1fr);
	}

	.btn-xl {
		font-size: 1.5rem;
		padding: 1.4rem 2rem;
		text-transform: uppercase;
	}

	.text-xl {
		font-size: 1.5rem;
	}

	.text-lg {
		font-size: 1.3rem;
		margin-bottom: 1rem;
	}

	.text-md {
		margin-bottom: 1rem;
		font-size: 1.2rem;
	}
}

@media (max-width: 700px) {
	.showcase::after {
		background: rgba(0, 0, 0, 0.6);
		box-shadow: inset 80px 80px 150px #000000, inset -80px -80px 150px #000000;
	}

	.showcase-content h1 {
		font-size: 2.5rem;
		line-height: 1;
	}

	.showcase-content p {
		font-size: 1rem;
	}

	#tab-1-content .tab-1-content-inner {
		grid-template-columns: 1fr;
		text-align: center;
	}

	#tab-2-content .tab-2-content-top {
		display: block;
		text-align: center;
	}

	#tab-2-content .tab-2-content-bottom {
		margin-top: 2rem;
		display: grid;
		grid-template-columns: 1fr;
		grid-gap: 2rem;
		text-align: center;
	}

	.btn-xl {
		font-size: 1rem;
		padding: 1.2rem 1.6rem;
		text-transform: uppercase;
	}
}

@media(max-height: 600px) {
  .showcase-content {
	margin-top: 3rem;
}
}
    </style>
</head>

<body>
    <header class="showcase">
        <div class="showcase-top">
            <a href="auth/register" class="showcase-top-1">register</a>
            <a href="auth/login" class="btn btn-rounded">Sign In</a>

        </div>
        <div class="showcase-content">
            <div class="sbuttons">

                <a href="mailto:kesbangpollinmas@nganjukkab.go.id" target="_blank" class="sbutton email"
                    tooltip="Email"><i class="fa-solid fa-envelope"></i></a>

                <a href="tel:(0358)328079" target="_blank" class="sbutton phone" tooltip="Telepon (0358) 328079"><i
                        class="fa-solid fa-phone"></i></i></a>

                <a target="_blank" class="sbutton mainsbutton" tooltip="Info lebih lanjut"><i
                        class="fa-solid fa-question"></i></a>

            </div>
            <p><b>Perizinan</b></p>
            <!-- <p>Perizinan Rekomendasi Penelitian</p> -->
            <p><b>Rekomendasi Penelitian</b></p>
            <!-- <h2>sebelum download, harap membaca persyaratan di bawah ini</h2> -->
            <br>
            <a href="https://simpelmasjar.nganjukkab.go.id/file/FormPenelitian.doc" class="btn btn-xl">Download Formulir
                Persyaratan</a>
            <br>
            <h6>*sebelum download, harap membaca persyaratan di bawah ini</h6>
        </div>
    </header>
    <section class="tabs">
        <div class="container">
            <div id="tab-1" class="tab-item ">
                <!-- <i class="fas fa-door-open fa-3x"></i> -->
                <p class="hide-sm">Dasar Hukum</p>
            </div>
            <div id="tab-2" class="tab-item">
                <!-- <i class="fas fa-tablet-alt fa-3x"></i> -->
                <p class="hide-sm">Tujuan</p>
            </div>
            <div id="tab-3" class="tab-item">
                <!-- <i class="fas fa-tags fa-3x"></i> -->
                <p class="hide-sm">Ketentuan</p>
            </div>
            <div id="tab-4" class="tab-item tab-border">
                <!-- <i class="fas fa-door-open fa-4x"></i> -->
                <p class="hide-sm">Kategori Peneliti</p>
            </div>
            <!-- <div id="tab-5" class="tab-item">
                <i class="fas fa-tablet-alt fa-3x"></i>
                <p class="hide-sm">Lembaga / PT</p>
            </div> -->
            <div id="tab-6" class="tab-item">
                <!-- <i class="fas fa-tags fa-3x"></i> -->
                <p class="hide-sm">Catatan</p>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="container">
            <!-- Tab Content 1 dasar hukum -->
            <div id="tab-1-content" class="tab-content-item">
                <div class="tab-1-content-inner">
                    <div>
                        <ol>
                            <li>Undang-undang Nomor 18 Tahun 2002 tentang Sistem Nasional Penelitian, Pengembangan,
                                dan Penerapan Ilmu Pengetahuan dan Teknologi</li> <br>
                            <li>Peraturan Menteri Dalam Negeri Nomor 20 Tahun 2011 tentang Pedoman Penelitian dan
                                Pengembangan di Lingkungan Kementerian Dalam Negeri dan Pemerintah Daerah</li> <br>
                            <li>Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 7 Tahun 2014 tentang
                                Perubahan Atas Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 64 Tahun 2011
                                tentang Pedoman Penertiban Rekomendasi Penelitian</li>
                        </ol>
                    </div>
                    <!-- <img src="https://i.ibb.co/J2xDJV7/tab-content-1.png" alt="" /> -->
                </div>
            </div>

            <!-- Tab Content 2 tujuan-->
            <div id="tab-2-content" class="tab-content-item">
                <div class="tab-1-content-top">
                    <div>
                        <ol>
                            <li>
                                Bahan Pertimbangan Pemberian Izin Penelitian oleh Pemerintah Daerah
                            </li><br>
                            <li>
                                Acuan Bagi Peneliti dalam Memperoleh Izin Penelitian
                            </li>
                        </ol>

                    </div>
                </div>
            </div>

            <!-- Tab Content 3 ketentuan -->
            <div id="tab-3-content" class="tab-content-item">
                <div class="tab-1-content-top">
                    <ol>
                        <li>
                            Masa Berlaku 3 (tiga) bulan untuk S1
                        </li><br>
                        <li>
                            Masa Berlaku 6 (enam) bulan untuk S2 atau Lembaga
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Tab Content 4 Kategori peneliti-->
            <div id="tab-4-content" class="tab-content-item show">
                <div class="text-center">
                    <p class="text-lg">
                        Silakan melengkapi dokumen sesuai lokasi universitas / lembaga:
                    </p>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Jatim</th>
                            <th>Luar Jatim</th>
                            <th>Luar Negeri</th>
                            <th>Lembaga (Jatim)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pengantar dari Universitas/Lembaga (Asli)</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td>Proposal (Foto Copy)</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td>Foto Copy Identitas/ KTP</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td>Formulir Izin Penelitian yang telah diisi dan dibubuhi materai Rp. 10.000,-</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>-</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td>Surat dari Bakesbangpol Provinsi Jawa Timur (Asli)</td>
                            <td>-</td>
                            <td>✔</td>
                            <td>✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td>Paspor / Visa (Foto Copy)</td>
                            <td>-</td>
                            <td>-</td>
                            <td>✔</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Surat Keterangan Jalan dari Kepolisian (Foto Copy)</td>
                            <td>-</td>
                            <td>-</td>
                            <td>✔</td>
                            <td>-</td>
                        </tr </tbody>
                </table>
            </div>
        </div>

        <!-- Tab Content 5 lembaga/pt -->
        <!-- <div id="tab-5-content" class="tab-content-item">
            <div class="tab-2-content-top">
                <div>
                    <ol>
                        <li>Surat dari Bakesbangpol Provinsi Jawa Timur (Asli)</li> <br>
                        <li>Pengantar dari Universitas/Lembaga (Asli)</li> <br>
                        <li>Proposal (Foto Copy)</li>
                        <li>Foto Copy Identitas/ KTP</li>
                        <li>Formulir Izin Penelitian yang telah diisi dan dibubuhi materai Rp. 10.000,-</li>
                    </ol>
                </div>
            </div>
        </div> -->

        <!-- Tab Content 6 catatan-->
        <div id="tab-6-content" class="tab-content-item">
            <div class="tab-1-content-top">
                <!-- <ol>
                    <li>Untuk pengambilan surat rekomendasi penelitian, harap membawa dokumen (hardcopy)
                        asli yang telah dikirim ke email kami sebagai kelengkapan persyaratan pengajuan rekomendasi
                        penelitian.</li><br>
                    <li>
                        Untuk pengisian formulir permohonan rekomendasi penelitian/survey/magang, harap
                        menggunakan huruf balok untuk menghindari kesalahan dalam entry data
                    </li>
                </ol> -->
                <p class="text-center">Untuk pengambilan surat rekomendasi penelitian, harap membawa dokumen (hardcopy)
                    asli yang telah dikirim ke email kami sebagai kelengkapan persyaratan pengajuan rekomendasi
                    penelitian.<br>
                </p>
                <p class="text-center">Untuk pengisian formulir permohonan rekomendasi penelitian/survey/magang, harap
                    menggunakan huruf balok untuk menghindari kesalahan dalam entry data</p>
            </div>
        </div>
    </section>





    <!-- <footer class="footer">
        <p>Questions? Call 1-866-579-7172</p>
        <div class="footer-cols">
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Ways To Watch</a></li>
                <li><a href="#">Corporate Information</a></li>
                <li><a href="#">Netflix Originals</a></li>
            </ul>
            <ul>
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Terms Of Use</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <ul>
                <li><a href="#">Account</a></li>
                <li><a href="#">Redeem Gift Cards</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Speed Test</a></li>
            </ul>
            <ul>
                <li><a href="#">Media Center</a></li>
                <li><a href="#">Buy Gift Cards</a></li>
                <li><a href="#">Cookie Preferences</a></li>
                <li><a href="#">Legal Notices</a></li>
            </ul>
        </div>

    </footer> -->
    <script>
        const tabItems = document.querySelectorAll('.tab-item');
const tabContentItems = document.querySelectorAll('.tab-content-item');

// Select tab content item
function selectItem(e) {
	// Remove all show and border classes
	removeBorder();
	removeShow();
	// Add border to current tab item
	this.classList.add('tab-border');
	// Grab content item from DOM
	const tabContentItem = document.querySelector(`#${this.id}-content`);
	// Add show class
	tabContentItem.classList.add('show');
}

// Remove bottom borders from all tab items
function removeBorder() {
	tabItems.forEach(item => {
		item.classList.remove('tab-border');
	});
}

// Remove show class from all content items
function removeShow() {
	tabContentItems.forEach(item => {
		item.classList.remove('show');
	});
}

// Listen for tab item click
tabItems.forEach(item => {
	item.addEventListener('click', selectItem);
});
    </script>
</body>

</html>