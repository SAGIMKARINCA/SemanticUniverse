# Semantic Universe Kararlar Kaydı

Bu dosya, bugüne kadar alınan ana kararların kısa kaydını tutar.

## D-001 | Semantic Universe ana üst sistemdir

Karar:
- Semantic Universe, tekil bir uygulama değildir; tüm alt ürünleri ve sistemleri taşıyan ana üst sistemdir.

Neden:
- Kullanıcının bütün ürünlerini ve standartlarını tek çatı altında toplamak için.

## D-002 | Laravel zemin, Semantic Universe üst sistem

Karar:
- Laravel, bir çerçeve/platform zemini olarak ele alınacaktır.
- Semantic Universe, bu zemin üzerinde kurulan `Sistem Ana Yükleyicisi` olacaktır.

Neden:
- Çerçeve ile üst sistemi kavramsal olarak karıştırmamak için.

## D-003 | Yazılım yaşam döngüsünde Spiral model kullanılacak

Karar:
- Gelişim, test ve yayın akışında Spiral model esas alınacaktır.

Neden:
- Büyük, riskli ve felsefî derinliği olan bu sistem doğrusal ilerlemiyor.

## D-004 | Önce staging, sonra production

Karar:
- Yerel -> GitHub -> staging -> production sırası izlenecektir.

Neden:
- Riski azaltmak için.
- Yapay zekâ araçlarıyla paylaşımlı test yapmak için.

## D-005 | PostgreSQL ana veri tabanı yönü olacak

Karar:
- Semantic Universe için ana veri tabanı yönü PostgreSQL olacaktır.

Neden:
- JSONB desteği sağlar.
- Event/state/rule metadata yapıları için uygundur.
- Yarı-yapısal veri taşıma kolaylığı sunar.

## D-006 | Tanrı Modu ayrı, genel alan ayrı

Karar:
- Tanrı Modu süper admin çalışma alanları genel kabuktan ayrılacaktır.

Neden:
- Süper admin operasyonları ile genel kullanıcı deneyimini karıştırmamak için.

## D-007 | Önce kaynaklar var edilecek

Karar:
- Evreni kurmanın ilk pratik adımı `Kaynaklar` katmanıdır.

Neden:
- Kullanıcının semantik felsefesine göre evren önce kaynakları var ederek kurulur.

## D-008 | Ortak hafıza katmanı zorunlu

Karar:
- Tüm işler `zaman çizgisi.md`, `decisions.md`, `definitions.md` ve `experiments.md` dosyalarına yazılacaktır.

Neden:
- Yapılanlar kaybolmasın diye.
- Belgesel/zaman çizgisi web katmanı sonradan üretilebilsin diye.

## D-009 | Staging alan adı `staging.semanger.com` olacak

Karar:
- İnternetten erişilebilir ilk resmî test ortamı `staging.semanger.com` altında çalışacaktır.

Neden:
- Production/genel alan ile geliştirme ve test alanını ayırmak için.

## D-010 | SemanticUniverse kabuğu resmî olarak Laravel içine taşınacak

Karar:
- `local-platform` artık geçici prototip kaynağı olarak kalacaktır.
- Resmî çalışan kabuk, Laravel uygulaması içindeki rota/görünüm/public dizin yapısında yürütülecektir.

Neden:
- GitHub, staging ve ileride production hattında aynı uygulama omurgasını kullanmak için.

## D-011 | Tarihçe web katmanı şifreli gösterilecek

Karar:
- Zaman çizgisi, kararlar, tanımlar ve deney kayıtları staging üzerinde şifre korumalı bir tarihçe sayfasında gösterilecektir.

Neden:
- Ortak hafızayı hem korunur hem de görünür kılmak için.
- Sonradan belgesel/zaman çizgisi sunum katmanına zemin hazırlamak için.

## D-012 | Tarihçe ayrı hosttan sunulacak

Karar:
- Tarihçe/tarihçe katmanı `tarihçe.semanger.com` üzerinden ayrı bir host olarak sunulacaktır.

Neden:
- Staging atölyeyi çalışma alanı olarak korurken tarihçe ve belgesel katmanına ayrı bir kimlik vermek için.

Sonuç:
- Staging sunucuda tarihçe hostu için ayrı Nginx vhost'u hazırlanmıştır; DNS kaydı da `89.252.182.73` adresine yönlendirilmiştir.

## D-013 | Ortak hafıza yazım standardı zorunlu

Karar:
- Ortak hafıza kayıtlarında kullanıcıya görünen tüm metinler Türkçe karakterlerle, büyük/küçük harf kurallarına uygun ve doğru noktalamayla yazılacaktır.
- Her cümle büyük harfle başlayacak ve uygun bir noktalama işaretiyle bitecektir.
- Kullanıcıya görünen bütün dosyalar UTF-8 olarak saklanacak; bozuk karakter içeren hiçbir metin yayına alınmayacaktır.

Neden:
- Tarihçe, karar ve deney kayıtlarının okunabilirliğini korumak için.
- Aynı tür yazım ve imla hatalarının tekrar etmesini önlemek için.
- Kullanıcıya görünen teknik ifadelerde zorunlu olmadıkça Türkçe karşılığı tercih edilecektir.

## D-014 | İlgili kaynak kaydı zorunlu

Karar:
- Kullanıcının verdiği dosyalar, eğitici açıklamalar, tanımlayıcı metinler ve referans kaynaklar ilgili tarihçe detayına metin ve/veya bağlantı olarak zorunlu biçimde yazılır.
- Bundan sonraki her eylemde ilgili detail kaydında İlgili Kaynaklar başlığı kontrol edilir ve gerekiyorsa doldurulur.

Neden:
- Tarihçe katmanını yalnızca sonuç kaydı değil, kaynak izi taşıyan bir araştırma hafızasına dönüştürmek için.
- Verilen belge, sunum ve eğitici metinlerin sonraki turlarda kaybolmasını önlemek için.

## D-015 | İlgili kaynak dosyaları sunucu arşivine alınır

Karar:
- Kullanıcının bu süreçlerde verdiği dosyalar, uygun olduğunda history/journal katmanı için sunucu arşivine yüklenir.
- Detail kayıtlarında dosya adı tıklanabilir bağlantı olarak gösterilir.
- Kaynağın yerel özgün yolu ve kısa açıklaması detail içinde korunur.

Neden:
- Tarihçe katmanını yalnız not değil, belge ve kanıt taşıyan yaşayan bir hafıza katmanına dönüştürmek için.
- Sonraki turlarda verilen determinant, sunum, eğitim ve açıklama dosyalarının kaybolmasını önlemek için.
## D-016 | Kaynak doküman kataloğu stratejik arşivdir

Karar:
- Kullanıcının verdiği sunum, pdf ve benzeri kaynak dosyalar journal/history katmanında Kaynak Dokümanlar başlığı altında kataloglanır.
- Bu katalog; ilkeler, değerler, stratejik yöntemler ve yol haritaları için resmî başvuru arşivi olarak kullanılır.
- Uygun boyuttaki dosyalar sunucu arşivine alınır; büyük dosyalar katalogda bekleyen kaynak olarak işaretlenir ve ayrı yükleme ile tamamlanır.

Neden:
- Gelecek planlama ve ürün kararlarında kullanılan kurucu kaynakların kaybolmamasını sağlamak için.
- Journal katmanını metin notlarının ötesinde, açılabilir ve indirilebilir bir bilgi arşivine dönüştürmek için.