@extends('layouts.main')

@section('styles')
.tab-vertical .tab-vertical__nav-link {
  color: #646f79;
  font-weight: 400;
  border-radius: 0;
  padding-left: 0;
}

.tab-vertical .tab-vertical__nav-link.active {
  color: #21c87a !important;
  background-color: transparent !important;
}

.tab-vertical .tab-vertical__nav-link:hover {
  color: #21c87a;
}

.nav-pills .nav-link {
    padding: 0.5rem 1rem;
    font-size: 1rem;
    color: #646f79;
}

@media (min-width: 992px){
	.space-3--lg {
	    padding-top: 3rem;
	    padding-bottom: 8.125rem;
	}
}

@media (min-width: 768px) {
  .tab-vertical-md {
    position: relative;
    box-shadow: 26px 0 26px -12px rgba(100, 111, 121, 0.06);
  }
  .tab-vertical-md::after {
    position: absolute;
    top: 0;
    right: 0;
    width: 4px;
    height: 100%;
    background-color: rgba(100, 111, 121, 0.09);
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    content: " ";
  }
  .tab-vertical-md .tab-vertical__nav-link {
    position: relative;
  }
  .tab-vertical-md .tab-vertical__nav-link::after {
    position: absolute;
    top: 0;
    right: 0;
    width: 4px;
    height: 100%;
    background-color: transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    content: " ";
  }
  .tab-vertical-md .tab-vertical__nav-link.active::after {
    background-color: #21c87a;
  }
  .tab-vertical-md .tab-vertical__nav-link:hover {
    color: #21c87a;
  }
}
@endsection

@section('page')

<div class="container space-3--lg">
  <div class="row justify-content-lg-between space-2 space-3--lg">
	  <div class="col-md-4 col-lg-4 mb-7 mb-md-0">
	  	<div class="tab-vertical tab-vertical-md py-5 mr-lg-7" style="height: 100%;">
	  	<div class="pr-md-7 mb-5">
          <h3 style="line-height: 1.8;">6 Kepentingan Talaqqi Dan Musyafahah Dalam Pembacaan Al-Quran.</h3>
        </div>
		  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link tab-vertical__nav-link active show" id="v-pills-features-tab" data-toggle="pill" href="#v-pills-features" role="tab" aria-controls="v-pills-features" aria-selected="false">
                1. Sunnah Rasulullah SAW
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-key-benefits-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-key-benefits" aria-selected="true">
                2. Talaqqi merupakan satu-satunya cara Al-Quran dipindahkan dan diriwayatkan
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-company" aria-selected="true">
                3. Menerima ilmu dengan sanad yang sahih sampai kepada Rasulullah
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-company" aria-selected="true">
                4. Mengetahui kesahihan,kebenaran dan kebolehpercayaan ilmu yang dipelajari.
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-5" role="tab" aria-controls="v-pills-company" aria-selected="false">
                5. Menghindari dari keciciran ayat Al-Quran
              </a>
              <a class="nav-link tab-vertical__nav-link" id="v-pills-company-tab" data-toggle="pill" href="#v-pills-6" role="tab" aria-controls="v-pills-company" aria-selected="false">
                6. Mengenalpasti ayat-ayat Al-Quran palsu atau yang diselewengkan.
              </a>
          </div>
		</div>
	  </div>
	  <div class="col-md-8">
		<div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade active show" id="v-pills-features" role="tabpanel" aria-labelledby="v-pills-features-tab">
              <div class="row align-items-lg-center" style="min-height: 300px;">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="https://qurandigital.com/wp-content/uploads/2015/04/menghafal-quran-275x366.jpg" alt="Image Description" style="height: 100%;">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Sunnah Rasulullah SAW</h2>
                    <p>Baginda bertalaqqi Al-Quran dengan Malaikat Jibril dan mengkhatamkannya sekali setiap bulan Ramadhan dan dua kali pada tahun terakhir sebelum kewafatan Baginda SAW. Sejarah ini jelas menunjukkan kepada kita bagaimana bibit pendidikan telah berputik sejak awal kerasulan Nabi Muhammad SAW. Malaikat Jibril menyampaikan segala Firman Allah menerusi kaedah talaqqi musyafahah iaitu Jibril memulakan bacaan dan diikuti nabi, seterusnya dihafalkan ayat-ayat tersebut.</p>

                    <p>Bermula dari surah al-‘Alaq sehinggalah surah terakhir, kaedah yang sama digunakan dalam transmisi kalam Allah kepada manusia. Kaedah ini juga turut diaplikasikan Rasulullah SAW dalam usaha menyampaikan Kalam Allah kepada para sahabat seterusnya kaedah warisan ini terus diamalkan ketika mana ayat-ayat Allah disebarkan kepada seluruh umat manusia</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2">
              <div class="row align-items-lg-center">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="https://backgroundcheckall.com/wp-content/uploads/2017/12/islamic-background-tumblr-4.jpg" alt="Image Description">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Talaqqi merupakan satu-satunya cara Al-Quran dipindahkan dan diriwayatkan</h2>
                    <p>Ketika Islam di awal era kebangkitannya dan ayat-ayat al-Quran masih lagi
diturunkan, aktiviti penyebarannya adalah terhad kepada kaedah ringkas seperti membaca,
mengikut, mengulang dan memahaminya sahaja. Walaubagaimanapun, kaedah talaqqi
musyafahah ini telah diperhebat dengan pelbagai kaedah moden seperti kaedah alBaghdadiyah,
al-Muyassar, al-Iqra’, al-Baraqy, Kalam, al-Hattawiyyah, dan lain-lain
semata-mata ingin memastikan umat Islam berminat dan mudah untuk mempelajari Kalam
Allah yang agung ini</p>
					<p>
						Perkara ini dilakukan oleh para ulama’ bagi memastikan keaslian alQuran
terus terpelihara hingga ke akhir zaman. Walaupun kita dibanjiri dengan ledakan
kemajuan ICT yang katanya boleh memberi pendidikan tentang pembacaan Al-Quran, namun
ia masih terdapat pelbagai kekurangan dan kelemahan. Ringkasnya, ICT masih tidak boleh
menggantikan guru dalam memberi tunjuk ajar yang berkesan dalam pembacaan al-Quran
yang betul dan tepat. Kesimpulannya, Talaqqi musyafahah adalah kaedah pertama dan utama
untuk menyebarkan Kalam Allah
					</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3">
              <div class="row align-items-lg-center">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="https://cdn.hipwallpaper.com/m/76/2/0sOniL.jpg" alt="Image Description">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Menerima ilmu dengan sanad yang sahih sampai kepada Rasulullah</h2>
                    <p>Mempelajari ilmu dan memiliki sanad yang bersambung hingga Rasulullah adalah
suatu kelebihan yang mulia dan memberi kesan yang besar kepada pemiliknya. Ilmu dan
fakta yang dipelajari adalah bersifat tulus, benar, pragmatis dan sah kerana ia diterima
daripada Rasulullah SAW yang menerima panduan wahyu daripada Allah. Kebiasaannya,
amalan mendapatkan sanad yang sah ini banyak berlaku di negara-negara timur tengah dan
tidak kurang juga di sebelah negara-negara Asia.</p>
					<p>Guru-guru yang memiliki sanad ini akan
membentangkan senarai sanad mereka yang dinukilkan dalam helaian tertentu dan
kemudiannya melakukan akad pengijazahan untuk memeterai bahawa seseorang itu telah
menerima ilmu yang bersanad sehingga Rasulullah. Kelak, mereka ini akan menjadi orang
yang berautoriti dalam masyarakat untuk dijadikan rujukan dalam pelbagai ilmu tertumanya
berkaitan al-Quran</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4">
              <div class="row align-items-lg-center">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="https://media.gettyimages.com/photos/an-open-holy-quran-on-wood-stand-with-mihrab-in-background-picture-id951900780?k=6&m=951900780&s=612x612&w=0&h=eQSYRHxu6QxkCpe-EHxXDJZ6NlLZLLcYPiNs22GPT7w=" alt="Image Description">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Mengetahui kesahihan,kebenaran dan kebolehpercayaan ilmu yang dipelajari.</h2>
                    <p>Abdul Rahman bin Abdul Khaliq dalam kitabnya berjudul kaedah menghafaz alquran,
beliau menekankan kaedah kedua hafalan iaitu membetulkan ucapan dan bacaan.
Beliau menyarankan kepada para huffaz supaya membetulkan ucapan dan bacaan mereka
dengan memperdengarkan bacaan mereka kepada seorang qari yang baik atau huffaz yang
mahir.13 Guru yang mahir ini amat berperanan dalam memastikan setiap inci ayat yang
diperdengarkan adalah tepat berdasarkan bacaan Rasulullah.</p>
					<p>
						Demikian juga adalah lebih baik jika guru-guru ini mempunyai sanad yang bersambung dengan Rasulullah supaya ilmu yang
diterima lebih meyakinkan. Hal ini juga sesuai diaplikasi dalam ilmu-ilmu lain seperti tafsir,
fiqh, sains, mantik, akidah, ibadah dan lain-lain.
					</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5">
              <div class="row align-items-lg-center">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="http://newzoogle.com/wp-content/uploads/2017/07/Islamic-Wallpaper.jpg" alt="Image Description">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Menghindari dari keciciran ayat Al-Quran</h2>
                    <p>Perkara ini dapat direalisasikan jika para pelajar dan guru sentiasa bersikap jujur dan
bertanggungjawab terhadap al-Quran. Ketelitian amat diperlukan ketika melakukan
pembacaan dan sebarang kesilapan wajib diperbetulkan dengan kadar segera. Keciciran ayat
amat dikhuatirkan oleh para huffaz al-Quran. Oleh hal yang demikian, usaha memulakan
hafalan atau mengulang hafalan perlulah dilakukan secara konsisten dihadapan guru supaya
perkara buruk ini dapat dielakkan dari berlaku. </p>
					<p>
						Ketika al-Quran masih dalam usaha pengumpulannya, Saidina Umar al-Khattab telah
melantik Zaid bin Thabit untuk mengumpulkan ayat-ayat al-Quran dan didokumentasi dalam
bentuk tulisan. Ketika usaha ini dilakukan, Zaid bin Thabit menemui para sahabat untuk
mendengar bacaan mereka dan meneliti sebarang catatan yang pernah dikumpulkan. Proses
talaqqi yang dilalui ini membolehkan Zaid untuk mengesan kekurangan pada ayat-ayat yang
dibaca disamping dapat memastikan ayat-ayat yang telah dimansuhkan tidak dikumpulkan
dalam mushaf yang akan ditulisnya kelak. Usaha menghindarkan keciciran ayat ini bukan
sahaja telah memenuhi hak al-Quran tetapi memenuhi tanggungjawab kemanusiaan iaitu
membolehkan umat Islam masa kini dapat membaca Kalam Allah yang menjadi panduan
hidup ummat manusia. 
					</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6">
              <div class="row align-items-lg-center">
                <div class="col-lg-5 mb-7 mb-7 mb-lg-0">
                  <img class="img-fluid" src="http://images6.fanpop.com/image/photos/39000000/Makkah-clock-tower-islam-39073835-2448-3264.jpg" alt="Image Description">
                </div>

                <div class="col-lg-7">
                  <!-- Description -->
                  <div class="pl-lg-4">
                    <h2 class="h3 mb-3">Mengenalpasti ayat-ayat Al-Quran palsu atau yang diselewengkan.</h2>
                    <p>Sejak awal al-Quran diturunkan, para musyrikin Mekah sentiasa berusaha
memesongkan akidah umat Islam dengan cara menyeleweng dan mencipta syair-syair untuk
menandingi kehebatan ayat al-Quran. Usaha ini bukan sahaja sia-sia malah mendapat
kemurkaan dari Allah SWT. Perkara ini turut berlangsung pada zaman ini dan bertambah
dahsyat apabila mereka memaniplasi ilmu dan kemahiran ICT untuk meruntuhkan akidah
ummat yang telah sedia lemah. Pelbagai artikel yang menyesatkan termasuk pembinaan alQuran
palsu dilakukan dan disebarkan di internet. Laman-laman web ini sangat mudah untuk
dilayari dan sangat berbahaya kepada umat Islam yang membacanya dan tidak melakukan
sebarang penelitian mendalam tentangnya</p>
					<p>
						Rentetan masalah ini, para Qurra’ perlu membangunkan kelas-kelas pengajian alQuran
demi memberi didikan kepada umat Islam tentang al-Quran supaya kelak tidak mudah
terpedaya dengan pemalsuan yang dahsyat ini. Selain itu usaha membongkarkan kejahatan ini
mesti dilakukan dengan sebaran di internet termasuk melalui kelas-kelas pengajian al-Quran
atau selainnya. Berdasarkan kelas-kelas ini, para guru mungkin dapat mengesan sebarang
ayat al-Quran yang dipalsukan yang mungkin diamalkan oleh sesetengah umat Islam. Aktiviti
pemurnian mesti dilakukan oleh semua pihak yang mempunyai autoriti dalam bidang alQuran
demi menjaga kesucian kitab yang agung ini. 
					</p>
                    <a href="http://repository.um.edu.my/87964/">
                      Learn More
                      <span class="fa fa-angle-right align-middle ml-2"></span>
                    </a>
                  </div>
                  <!-- End Description -->
                </div>
              </div>
            </div>
          </div>
	  </div>
  </div>

</div>

@endsection