# Semantic Universe Zaman Çizgisi

Bu dosya, Semantic Universe yolculuğunda bugüne kadar yapılan ana işleri tarih sırası ile toplar.

## 2026-03-26 | İlk belge ve prototip incelemeleri

Ne yaptık:
- Hemorrhoid çalışması için mevcut HTML/PHP/form altyapıları incelendi
- form yapıları, hasta/protokol/takip akışı ve veri toplama mantığı üzerinde çalışıldı

Neden yaptık:
- ilk çalışan alan olarak tıbbî alan üzerinden bir uygulama ve veri akışı kurmak
- daha büyük semantik platform düşüncesine bir pilot domain hazırlamak

Sonuç:
- yerelde çalışan hasta -> protokol -> klinik form -> takip mantığı kuruldu

## 2026-03-26 | Laravel platform zemini kuruldu

Ne yaptık:
- Laravel tabanlı altyapı kuruldu
- hasta, examination protocol, clinical form ve follow-up yapıları oluşturuldu
- auth, rol/yetki, temel CRUD ve dashboard katmanları hazırlandı

Neden yaptık:
- daha güçlü ve büyüyebilir bir platform zemini oluşturmak
- mevcut prototipten çıkarak ürünsel mimariye geçmek

Sonuç:
- çalışan bir Laravel çekirdeği oluştu

## 2026-03-26 | Semantic Universe üst yapısı tanımlanmaya başlandı

Ne yaptık:
- Semantic Universe ana proje fikri, felsefî üst yapı ve bunun ilk belgeleri oluşturuldu
- mimari, roadmap, workflow ve backlog belgeleri açıldı

Neden yaptık:
- Hemorrhoid gibi tekil uygulamaların üstüne oturacağı ana evreni tarif etmek

Sonuç:
- Semantic Universe resmî bir program ve üst sistem olarak adlandırıldı

## 2026-03-26 | Tarihçe ve karar hafızası kuruldu

Ne yaptık:
- history, strategic execution log, decision register, foundation intake gibi belgeler açıldı
- documentary layer ve bilgi kabul katmanı oluşturuldu

Neden yaptık:
- yapılan işlerin kaybolmaması
- ileride manifesto, timeline, documentary ve etkileşimli tarihçe katmanı kurabilmek

Sonuç:
- yazılı hafıza ve karar izi oluşmaya başladı

## 2026-03-26 | Semantic Universe yerel kabuğu kuruldu

Ne yaptık:
- Hemorrhoid alanından ayrı olarak `SemanticUniverse` local platformu açıldı
- `http://localhost/SemanticUniverse/` adresinde çalışan ayrı shell yapısı kuruldu

Neden yaptık:
- public uygulama ile süper admin/god mode tabanlı ana platformu ayırmak
- semantik evrenin framework ve shell mantığını görsel olarak görebilmek

Sonuç:
- ayrı local SemanticUniverse kabuğu elde edildi

## 2026-03-26 | Semantic Universe kabuk tasarımı geliştirildi

Ne yaptık:
- top bar, ribbon, left tree nav, center workspace, right context panel, bottom dock yapısı kuruldu
- Outlook + Teams karışımı bir ana platform dili hedeflendi
- responsive/Bootstrap tabanlı bir shell üretilmeye çalışıldı

Neden yaptık:
- kullanıcının semantik sistemi görsel olarak yönlendirebileceği bir framework ekranı oluşturmak

Sonuç:
- temel shell yapısı ortaya çıktı

## 2026-03-26 | Sistem > Kaynaklar > Kaynak Tanımla akışı başlatıldı

Ne yaptık:
- ilk ana menü olarak `System`
- onun altında `Kaynaklar`
- onun altında `Kaynak Tanımla`
yapısı kuruldu

Neden yaptık:
- kullanıcıya göre evreni var etmenin ilk adımı kaynakları var etmekti

Sonuç:
- ilk semantik veri giriş ekranının iskeleti kuruldu

## 2026-03-26 | Tanrı Modu mantığı kuruldu

Ne yaptık:
- Tanrı Modu giriş/çıkış mantığı eklendi
- giriş yapıldığında süper admin içeriği gören, çıkış yapıldığında boş shell gösteren yapı kuruldu
- GodMode profil bilgisi shell'e eklendi

Neden yaptık:
- public görünüm ile yetkili süper admin çalışma alanını ayırmak

Sonuç:
- kontrol edilen shell modu oluştu

## 2026-03-26 | Kullanıcı semantik felsefeyi aktarmaya başladı

Ne yaptık:
- kullanıcının tıbbî, cerrahî, bilişim, sistem mühendisliği ve yönetim bilimi arka planı kayda alındı
- `nesne / olay`
- `nesneden kaynağa geçiş`
- `varlık + fonksiyon + aktivite + hedef`
- `insan / taşınır / taşınmaz / zaman`
- `temel / türe / türetilmiş / fonksiyonel`
ayrımları kaydedildi

Neden yaptık:
- Semantic Universe'un kurucu ontolojisini kaybetmeden yazılı hafızaya geçirmek

Sonuç:
- ilk semantik çekirdek yazılı hale geldi

## 2026-03-26 | Proses felsefesi kayda alındı

Ne yaptık:
- olay evreninin proseslerle açıklanması
- proseslerin 4 ana sınıfa ayrılması
- varlık ve yönetim
- ana iş
- destek hizmet
- ölçme değerleme ve gelişme
sınıfları yazıldı

Neden yaptık:
- olay/proses semantiğini kaynak semantiği ile birlikte kurmak

Sonuç:
- kaynak + proses tabanlı ana kurgu ortaya çıktı

## 2026-03-27 | SemanticUniverse resmî GitHub reposu açıldı

Ne yaptık:
- `https://github.com/SAGIMKARINCA/SemanticUniverse` reposu açıldı
- `C:\Projects\semantic-universe` klasörü bu repoya bağlandı
- ilk foundation commitleri ve CI iskeleti eklendi

Neden yaptık:
- local çalışmayı resmî sürümlü merkez haline getirmek

Sonuç:
- GitHub resmi kaynak oldu

## 2026-03-27 | Canlıya geçiş ve PostgreSQL yönü netleşti

Ne yaptık:
- canlıya geçiş stratejisi çıkartıldı
- staging -> production modeli kabul edildi
- PostgreSQL ana veri tabanı yönü olarak önerildi
- live platform migration planları oluşturuldu

Neden yaptık:
- Semantic Universe'u SaaS ve POA büyümesine uygun hale getirmek

Sonuç:
- canlı mimariye geçiş için plan ve kararlar oluştu

## 2026-03-27 | ZEN / Xen Orchestra üzerinde yeni Ubuntu VM denemesi başlatıldı

Ne yaptık:
- ZEN panel erişimi doğrulandı
- Xen Orchestra içinde yeni Ubuntu 24.04 VM açma denemeleri yapıldı
- network ve boot sorunları görüldü
- ISO import timeout problemi ile karşılaşıldı

Neden yaptık:
- staging için yeni Ubuntu tabanlı temiz bir ortam açmak

Sonuç:
- hypervisor/ISO katmanında zaman kaybı olduğu, önce audit ve düzgün ISO stratejisi gerektiği anlaşıldı

## 2026-03-28 | ZEN Server audit ve optimizasyon fazı baslatildi

Ne yaptık:
- ZEN Server için audit checklist çıkarıldı
- VM'ler için ilk sınıflandırma taslağı oluşturuldu

Neden yaptık:
- storage/network/VM düzenini anlamadan agresif değişiklik yapmamak

Sonuç:
- güvenli optimizasyon çerçevesi oluştu

## 2026-03-28 | Ortak Hafıza Katmanı istendi

Ne yaptık:
- `semantic-universe-journal` klasörü oluşturuldu
- `timeline.md`, `decisions.md`, `definitions.md`, `experiments.md` dosyaları açıldı

Neden yaptık:
- tüm konuşmaların, kararların, tanımların ve denemelerin ortak hafızada tutulması
- gelecekte bunu timeline / documentary / web katmanına dönüştürebilmek

Sonuç:
- resmî ortak hafıza katmanının ilk çekirdeği açıldı

## 2026-03-28 | Çalışan Ubuntu staging sunucusu kuruldu

Ne yaptık:
- yeni Ubuntu sunucusu `89.252.182.73` adresinde ayağa kaldırıldı
- SSH/SFTP erişimi doğrulandı
- `nginx`, `postgresql`, `redis-server`, `php 8.3`, `composer` kuruldu
- `semanticuniverse_staging` PostgreSQL veritabanı ve `semanticuser` kullanıcısı oluşturuldu
- `SemanticUniverse` GitHub reposu `/var/www/semantic-universe` altına clone edildi
- repo içinde `apps/platform` Laravel uygulaması kuruldu
- `.env` PostgreSQL'e bağlandı ve migration'lar çalıştırıldı

Neden yaptık:
- local çalışmadan çıkarak internetten erişilebilir resmî staging ortamı kurmak

Sonuç:
- `staging.semanger.com` üzerinde çalışan bir Laravel staging ortamı elde edildi

## 2026-03-28 | SemanticUniverse shell Laravel uygulamasına taşınmaya başlandı

Ne yaptık:
- `C:\Projects\semantic-universe\apps\platform` altında Laravel app oluşturuldu
- `local-platform/index.php` mantığı Laravel route + Blade görünüme taşınacak şekilde port script'i yazıldı
- `routes/web.php` içine `semantic-universe`, `godmode-login`, `logout` route'ları eklendi
- `resources/views/semantic-universe/shell.blade.php` ve `public/semantic-universe.css` üretilip Laravel app'e taşındı
- route cache temizlenerek yeni route'lar doğrulandı

Neden yaptık:
- ayrı bir lokal PHP shell yerine aynı SemanticUniverse reposu içinde resmî Laravel platform katmanına geçmek

Sonuç:
- local shell artık Laravel içinde yaşayacak hale getirildi ve staging'e gönderilmeye hazırlandı

## 2026-03-28 | Şifreli journal web katmanı kuruldu

Ne yaptık:
- semantic-universe-journal klasöründeki timeline, decisions, definitions ve experiments dosyaları resmi ortak hafıza katmani olarak teyit edildi
- bu dosyalar Laravel staging uygulamasina kopyalandı
- şifre ile açılan bir history/timeline journal sayfası tasarlandı

Neden yaptık:
- ortak hafızayı sadece dosya sistemi içinde değil, web tabanlı korunur bir alanda da görebilmek
- ileride belgesel / timeline sunum katmanına geçiş zemini oluşturmak

Sonuç:
- staging ortamı için şifre korumalı journal arayüzü hazırlandı

## 2026-03-28 | Tarihçe hostu staging sunucuda hazırlandı

Ne yaptık:
- `history.semanger.com` için staging sunucuda ayrı Nginx vhost tanımı oluşturuldu
- kök istekleri `semantic-universe/journal` alanına yönlendirecek host akışı kuruldu
- staging sunucuda `git pull`, `composer install`, `optimize:clear` ve Nginx/PHP-FPM yenilemeleri yapıldı

Neden yaptık:
- ortak hafızayı ana atölyeden ayrı, belgesel/tarihçe odaklı bir host kimliğiyle sunmak

Sonuç:
- sunucu tarafı hazırlandı; `history.semanger.com` DNS kaydı `89.252.182.73`e yönlendirildiğinde şifreli journal alanı doğrudan açılabilecek

## 2026-03-29 | Staging shell yerleşim ve preset davranış hataları düzeltildi

Ne yaptık:
- üst bar sağ aksiyon alanının taşma riskini azaltan grid düzeltmeleri yapıldı
- alt dock grid oranları daha dengeli hale getirildi
- app rail alt etiketi için boşluk düzeltildi
- preset seçimlerinde aktif üst menü bilgisinin korunması sağlandı

Neden yaptık:
- staging shell'de görünen ilk yerleşim ve durum yönetimi hatalarını temizlemek

Sonuç:
- shell daha kararlı bir yerleşime kavuştu ve preset değişiminde aktif menü durumu korunur hale geldi

## 2026-03-29 | Tarihçe hostu DNS kaydı eklendi

Ne yaptık:
- `history.semanger.com` için `A` kaydı DNS zonuna eklendi
- kayıt `89.252.182.73` staging sunucusuna yönlendirildi

Neden yaptık:
- ortak hafıza, history ve timeline katmanını ana staging atölyeden ayrı bir host kimliğiyle açmak

Sonuç:
- `history.semanger.com` artık DNS seviyesinde staging sunucusuna düşüyor
- sonraki adım history hostunu tarayıcıdan doğrulamak ve gerekirse SSL'yi tamamlamak

## 2026-03-29 | History journal belgesel timeline katmanına dönüştürüldü

Ne yaptık:
- journal ekranının Blade yapısı history odaklı belgesel akışa göre yeniden kuruldu
- hero istatistikleri, storyboard kartları ve documentary timeline kartları eklendi
- decisions, definitions ve experiments panelleri sağ yığın halinde yeniden düzenlendi

Neden yaptık:
- ortak hafıza katmanını düz markdown panellerden daha anlatılı ve sunumsal bir tarihçe yüzeyine dönüştürmek

Sonuç:
- history platformu artık timeline, karar izi ve deneyleri daha güçlü bir belgesel diliyle gösterecek seviyeye yaklaştı

## 2026-03-29 | History timeline navigasyonu ve kategori filtresi eklendi

Ne yaptık:
- timeline kayıtları için kuruluş, semantik, arayüz, altyapı ve history kategorileri tanımlandı
- history sayfasına filtre pill'leri ve öne çıkan timeline kartları eklendi
- timeline kartlarına kategori etiketleri ve anchor navigasyonu kazandırıldı

Neden yaptık:
- history katmanını sadece okunur bir markdown panelinden çıkartıp gezilebilir bir belgesel-timeline arayüzüne dönüştürmek

Sonuç:
- kullanıcı artık timeline akışında kategoriye göre odaklanabilecek ve öne çıkan kayıtlardan doğrudan ilgili bölüme atlayabilecek

## 2026-03-29 | History sayfasında overflow, arama, yıl filtresi ve sunum modu eklendi

Ne yaptık:
- journal sayfasında global overflow sorununu gideren ayrı body sınıfı tanımlandı
- timeline için arama kutusu ve yıl seçici eklendi
- featüred kartlar ve timeline kayıtları ortak filtre mantığına bağlandı
- tek tuşla yan panelleri gizleyen bir sunum modu eklendi

Neden yaptık:
- history sayfasında anchor ve scroll davranışını düzeltmek
- timeline içinde daha rahat gezinme ve sunum yapabilme imkanı kazandırmak

Sonuç:
- history katmanı artık daha akıcı kayıyor, arama/yıl filtresiyle gezilebiliyor ve sunum moduna alınabiliyor

## 2026-03-29 | History kayıtlarına ID hiyerarşisi ve detay dosyaları eklendi

Ne yaptık:
- Aynı gün içindeki history kayıtlarına SUH-YYYYMMDD-XX biçiminde kayıt kimlikleri tanımlandı
- Her kayıt için ayrı details markdown dosyaları üretildi
- History sayfasına kayıt bazlı Detaylar açılır penceresi eklendi

Neden yaptık:
- Aynı tarihteki birden fazla kaydı hiyerarşik ve okunur hale getirmek
- Her kayda bağlı konuşma, yapılan iş ve sonuç bilgisini ayrı dosya katmanında tutmak

Sonuç:
- History timeline artık hem kayıt kimliği hem de dosya tabanlı detay açılımı olan bir araştırma arayüzüne dönüştü
