# Semantic Universe Timeline

Bu dosya, Semantic Universe yolculugunda bugune kadar yapilan ana isleri tarih sirasi ile toplar.

## 2026-03-26 | Ilk belge ve prototip incelemeleri

Ne yaptik:
- Hemorrhoid calismasi icin mevcut HTML/PHP/form altyapilari incelendi
- form yapilari, hasta/protokol/takip akisi ve veri toplama mantigi uzerinde calisildi

Neden yaptik:
- ilk calisan alan olarak tibbi alan uzerinden bir uygulama ve veri akisi kurmak
- daha buyuk semantik platform dusuncesine bir pilot domain hazirlamak

Sonuc:
- yerelde calisan hasta -> protokol -> klinik form -> takip mantigi kuruldu

## 2026-03-26 | Laravel platform zemini kuruldu

Ne yaptik:
- Laravel tabanli altyapi kuruldu
- hasta, examination protocol, clinical form ve follow-up yapilari olusturuldu
- auth, rol/yetki, temel CRUD ve dashboard katmanlari hazirlandi

Neden yaptik:
- daha guclu ve buyuyebilir bir platform zemini olusturmak
- mevcut prototipten cikarak urunsel mimariye gecmek

Sonuc:
- calisan bir Laravel cekirdegi olustu

## 2026-03-26 | Semantic Universe ust yapisi tanimlanmaya baslandi

Ne yaptik:
- Semantic Universe ana proje fikri, felsefi ust yapi ve bunun ilk belgeleri olusturuldu
- mimari, roadmap, workflow ve backlog belgeleri acildi

Neden yaptik:
- Hemorrhoid gibi tekil uygulamalarin ustune oturacagi ana evreni tarif etmek

Sonuc:
- Semantic Universe resmi bir program ve ust sistem olarak adlandirildi

## 2026-03-26 | Tarihce ve karar hafizasi kuruldu

Ne yaptik:
- history, strategic execution log, decision register, foundation intake gibi belgeler acildi
- documentary layer ve bilgi kabul katmani olusturuldu

Neden yaptik:
- yapilan islerin kaybolmamasi
- ileride manifesto, timeline, documentary ve etkileÅŸimli tarihce katmani kurabilmek

Sonuc:
- yazili hafiza ve karar izi olusmaya basladi

## 2026-03-26 | Semantic Universe local shell kuruldu

Ne yaptik:
- Hemorrhoid alanindan ayri olarak `SemanticUniverse` local platformu acildi
- `http://localhost/SemanticUniverse/` adresinde calisan ayri shell yapisi kuruldu

Neden yaptik:
- public uygulama ile super admin/god mode tabanli ana platformu ayirmak
- semantik evrenin framework ve shell mantigini gorsel olarak gorebilmek

Sonuc:
- ayri local SemanticUniverse kabugu elde edildi

## 2026-03-26 | Semantic Universe shell tasarimi gelistirildi

Ne yaptik:
- top bar, ribbon, left tree nav, center workspace, right context panel, bottom dock yapisi kuruldu
- Outlook + Teams karisimi bir ana platform dili hedeflendi
- responsive/Bootstrap tabanli bir shell uretilmeye calisildi

Neden yaptik:
- kullanicinin semantik sistemi gorsel olarak yonlendirebilecegi bir framework ekrani olusturmak

Sonuc:
- temel shell yapisi ortaya cikti

## 2026-03-26 | System > Kaynaklar > Kaynak Tanimla akisi baslatildi

Ne yaptik:
- ilk ana menu olarak `System`
- onun altinda `Kaynaklar`
- onun altinda `Kaynak Tanimla`
yapisi kuruldu

Neden yaptik:
- kullaniciya gore evreni var etmenin ilk adimi kaynaklari var etmekti

Sonuc:
- ilk semantik veri giris ekraninin iskeleti kuruldu

## 2026-03-26 | God Mode mantigi kuruldu

Ne yaptik:
- God Mode giris/cikis mantigi eklendi
- giris yapildiginda super admin icerigi goren, cikis yaptiginda bos shell gosteren yapi kuruldu
- GodMode profil bilgisi shell'e eklendi

Neden yaptik:
- public gorunum ile yetkili super admin calisma alanini ayirmak

Sonuc:
- kontrol edilen shell modu olustu

## 2026-03-26 | Kullanici semantik felsefeyi aktarmaya basladi

Ne yaptik:
- kullanicinin tibbi, cerrahi, biliÅŸim, sistem muhendisligi ve yonetim bilimi arka plani kayda alindi
- `nesne / olay`
- `nesneden kaynaga gecis`
- `varlik + fonksiyon + aktivite + hedef`
- `insan / tasinir / tasinmaz / zaman`
- `temel / ture / turetilmis / fonksiyonel`
ayrimlari kaydedildi

Neden yaptik:
- Semantic Universe'un kurucu ontolojisini kaybetmeden yazili hafizaya gecirmek

Sonuc:
- ilk semantik cekirdek yazili hale geldi

## 2026-03-26 | Proses felsefesi kayda alindi

Ne yaptik:
- olay evreninin proseslerle aciklanmasi
- proseslerin 4 ana sinifa ayrilmasi
- varlik ve yonetim
- ana is
- destek hizmet
- olcme degerleme ve gelisme
siniflari yazildi

Neden yaptik:
- olay/proses semantigini kaynak semantigi ile birlikte kurmak

Sonuc:
- kaynak + proses tabanli ana kurgu ortaya cikti

## 2026-03-27 | SemanticUniverse resmi GitHub reposu acildi

Ne yaptik:
- `https://github.com/SAGIMKARINCA/SemanticUniverse` reposu acildi
- `C:\Projects\semantic-universe` klasoru bu repoya baglandi
- ilk foundation commitleri ve CI iskeleti eklendi

Neden yaptik:
- local calismayi resmi surumlu merkez haline getirmek

Sonuc:
- GitHub resmi kaynak oldu

## 2026-03-27 | Canliya gecis ve PostgreSQL yonu netlesti

Ne yaptik:
- canliya gecis stratejisi cikartildi
- staging -> production modeli kabul edildi
- PostgreSQL ana veri tabani yonu olarak onerildi
- live platform migration planlari olusturuldu

Neden yaptik:
- Semantic Universe'u SaaS ve POA buyumesine uygun hale getirmek

Sonuc:
- canli mimariye gecis icin plan ve kararlar olustu

## 2026-03-27 | ZEN / Xen Orchestra uzerinde yeni Ubuntu VM denemesi baslatildi

Ne yaptik:
- ZEN panel erisimi dogrulandi
- Xen Orchestra icinde yeni Ubuntu 24.04 VM acma denemeleri yapildi
- network ve boot sorunlari goruldu
- ISO import timeout problemi ile karsilasildi

Neden yaptik:
- staging icin yeni Ubuntu tabanli temiz bir ortam acmak

Sonuc:
- hypervisor/ISO katmaninda zaman kaybi oldugu, once audit ve duzgun ISO stratejisi gerektigi anlasildi

## 2026-03-28 | ZEN Server audit ve optimizasyon fazi baslatildi

Ne yaptik:
- ZEN Server icin audit checklist cikarildi
- VM'ler icin ilk siniflandirma taslagi olusturuldu

Neden yaptik:
- storage/network/VM duzenini anlamadan agresif degisiklik yapmamak

Sonuc:
- guvenli optimizasyon cercevesi olustu

## 2026-03-28 | Ortak Hafiza Katmani istendi

Ne yaptik:
- `semantic-universe-journal` klasoru olusturuldu
- `timeline.md`, `decisions.md`, `definitions.md`, `experiments.md` dosyalari acildi

Neden yaptik:
- tum konusmalarin, kararlarin, tanimlarin ve denemelerin ortak hafizada tutulmasi
- gelecekte bunu timeline / documentary / web katmanina donusturebilmek

Sonuc:
- resmi ortak hafiza katmaninin ilk cekirdegi acildi

## 2026-03-28 | Calisan Ubuntu staging sunucusu kuruldu

Ne yaptik:
- yeni Ubuntu sunucusu `89.252.182.73` adresinde ayaÄŸa kaldirildi
- SSH/SFTP erisimi dogrulandi
- `nginx`, `postgresql`, `redis-server`, `php 8.3`, `composer` kuruldu
- `semanticuniverse_staging` PostgreSQL veritabani ve `semanticuser` kullanicisi olusturuldu
- `SemanticUniverse` GitHub reposu `/var/www/semantic-universe` altina clone edildi
- repo icinde `apps/platform` Laravel uygulamasi kuruldu
- `.env` PostgreSQL'e baglandi ve migration'lar calistirildi

Neden yaptik:
- local calismadan cikarak internetten erisilebilir resmi staging ortami kurmak

Sonuc:
- `staging.semanger.com` uzerinde calisan bir Laravel staging ortami elde edildi

## 2026-03-28 | SemanticUniverse shell Laravel uygulamasina tasinmaya baslandi

Ne yaptik:
- `C:\Projects\semantic-universe\apps\platform` altinda Laravel app olusturuldu
- `local-platform/index.php` mantigi Laravel route + Blade gorunume tasinacak sekilde port script'i yazildi
- `routes/web.php` icine `semantic-universe`, `godmode-login`, `logout` route'lari eklendi
- `resources/views/semantic-universe/shell.blade.php` ve `public/semantic-universe.css` uretilip Laravel app'e tasindi
- route cache temizlenerek yeni route'lar dogrulandi

Neden yaptik:
- ayri bir lokal PHP shell yerine ayni SemanticUniverse reposu icinde resmi Laravel platform katmanina gecmek

Sonuc:
- local shell artik Laravel icinde yasayacak hale getirildi ve staging'e gonderilmeye hazirlandi

## 2026-03-28 | Sifreli journal web katmani kuruldu

Ne yaptik:
- semantic-universe-journal klasorundeki timeline, decisions, definitions ve experiments dosyalari resmi ortak hafiza katmani olarak teyit edildi
- bu dosyalar Laravel staging uygulamasina kopyalandi
- sifre ile acilan bir history/timeline journal sayfasi tasarlandi

Neden yaptik:
- ortak hafizayi sadece dosya sistemi icinde degil, web tabanli korunur bir alanda da gorebilmek
- ileride belgesel / timeline sunum katmanina gecis zemini olusturmak

Sonuc:
- staging ortami icin sifre korumali journal arayuzu hazirlandi

## 2026-03-28 | history hostu staging sunucuda hazirlandi

Ne yaptik:
- `history.semanger.com` icin staging sunucuda ayri Nginx vhost tanimi olusturuldu
- kok istekleri `semantic-universe/journal` alanina yonlendirecek host akisi kuruldu
- staging sunucuda `git pull`, `composer install`, `optimize:clear` ve Nginx/PHP-FPM yenilemeleri yapildi

Neden yaptik:
- ortak hafizayi ana atolyeden ayri, belgesel/tarihce odakli bir host kimligiyle sunmak

Sonuc:
- sunucu tarafi hazirlandi; `history.semanger.com` DNS kaydi `89.252.182.73`e yonlendirildiginde sifreli journal alani dogrudan acilabilecek

## 2026-03-29 | Staging shell yerlesim ve preset davranis hatalari duzeltildi

Ne yaptik:
- ust bar sag aksiyon alaninin tasma riskini azaltan grid duzeltmeleri yapildi
- alt dock grid oranlari daha dengeli hale getirildi
- app rail alt etiketi icin bosluk duzeltildi
- preset secimlerinde aktif ust menu bilgisinin korunmasi saglandi

Neden yaptik:
- staging shell'de gorunen ilk yerlesim ve durum yonetimi hatalarini temizlemek

Sonuc:
- shell daha kararli bir yerlesime kavustu ve preset degisiminde aktif menu durumu korunur hale geldi

## 2026-03-29 | History hostu DNS kaydi eklendi

Ne yaptik:
- `history.semanger.com` icin `A` kaydi DNS zonuna eklendi
- kayit `89.252.182.73` staging sunucusuna yonlendirildi

Neden yaptik:
- ortak hafiza, history ve timeline katmanini ana staging atolyeden ayri bir host kimligiyle acmak

Sonuc:
- `history.semanger.com` artik DNS seviyesinde staging sunucusuna dusuyor
- sonraki adim history hostunu tarayicidan dogrulamak ve gerekirse SSL'yi tamamlamak

## 2026-03-29 | History journal belgesel timeline katmanina donusturuldu

Ne yaptik:
- journal ekraninin Blade yapisi history odakli belgesel akisa gore yeniden kuruldu
- hero istatistikleri, storyboard kartlari ve documentary timeline kartlari eklendi
- decisions, definitions ve experiments panelleri sag yigin halinde yeniden duzenlendi

Neden yaptik:
- ortak hafiza katmanini duz markdown panellerden daha anlatili ve sunumsal bir tarihce yuzeyine donusturmek

Sonuc:
- history platformu artik timeline, karar izi ve deneyleri daha guclu bir belgesel diliyle gosterecek seviyeye yaklasti

## 2026-03-29 | History timeline navigasyonu ve kategori filtresi eklendi

Ne yaptik:
- timeline kayitlari icin kurulus, semantik, arayuz, altyapi ve history kategorileri tanimlandi
- history sayfasina filtre pill'leri ve one cikan timeline kartlari eklendi
- timeline kartlarina kategori etiketleri ve anchor navigasyonu kazandirildi

Neden yaptik:
- history katmanini sadece okunur bir markdown panelinden cikartip gezilebilir bir belgesel-timeline arayuzune donusturmek

Sonuc:
- kullanici artik timeline akisinda kategoriye gore odaklanabilecek ve one cikan kayitlardan dogrudan ilgili bolume atlayabilecek

## 2026-03-29 | History sayfasinda overflow, arama, yil filtresi ve sunum modu eklendi

Ne yaptik:
- journal sayfasinda global overflow sorununu gideren ayri body sinifi tanimlandi
- timeline icin arama kutusu ve yil secici eklendi
- featured kartlar ve timeline kayitlari ortak filtre mantigina baglandi
- tek tusla yan panelleri gizleyen bir sunum modu eklendi

Neden yaptik:
- history sayfasinda anchor ve scroll davranisini duzeltmek
- timeline icinde daha rahat gezinme ve sunum yapabilme imkani kazandirmak

Sonuc:
- history katmani artik daha akici kayiyor, arama/yil filtresiyle gezilebiliyor ve sunum moduna alinabiliyor

## 2026-03-29 | History kayitlarina ID hiyerarsisi ve detay dosyalari eklendi

Ne yaptik:
- Ayni gun icindeki history kayitlarina SUH-YYYYMMDD-XX biciminde kayit kimlikleri tanimlandi
- Her kayit icin ayri details markdown dosyalari uretildi
- History sayfasina kayit bazli Detaylar acilir penceresi eklendi

Neden yaptik:
- Ayni tarihteki birden fazla kaydi hiyerarsik ve okunur hale getirmek
- Her kayda bagli konusma, yapilan is ve sonuc bilgisini ayri dosya katmaninda tutmak

Sonuc:
- History timeline artik hem kayit kimligi hem de dosya tabanli detay acilimi olan bir arastirma arayuzune donustu
