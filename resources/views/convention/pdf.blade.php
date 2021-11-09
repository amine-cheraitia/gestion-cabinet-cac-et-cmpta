<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mandat N° :{{$num_convention}}</title>

    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*             border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
    <!-- CSS only -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    --}}
</head>

<body>
    <div class="invoice-box pt-5">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr class="text-center">

                            <td class="title" style="text-align: center">
                                <img src="https://www.sparksuite.com/images/logo.png"
                                    style="width: 100%; max-width: 300px" />
                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left;width:40%">
                    Réf #: <strong>{{$num_convention}}</strong><br />

                    Date d'impression: <strong>{{Carbon\carbon::now()->format('d/m/Y')}}</strong>
                </td>
                <td colspan="3" style="text-align: right;width:40%">
                    Alger, le <strong>{{Carbon\carbon::parse($date_convention)->format('d/m/Y')}}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center">
                    <h2>ACCEPTATION DE MANDAT</h2>
                </td>
            </tr>

            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>

            <tr>
                <td colspan="6">


                </td>
            </tr>

        </table>
        <div style="color:black">
            Je soussigné, Hakima Meddahi, Commissaire aux comptes demeurant à Coopérative el Salama Bt53 N° D2
            Birkhadem, Alger, inscrit au Tableau de l'Ordre des Commissaires Aux Comptes sous le n°193, déclare
            l'acceptation
            du Mandat de {{$prestation}}/ Commissariat aux Comptes, au profit de {{$raison_social}} dont le siège social
            est sis à
            {{$adresse}} au titre des exercices du {{Carbon\carbon::parse($start)->format('Y')}} au
            {{Carbon\carbon::parse($end)->format('Y')}}<br><br>
            Le commissaire aux comptes déclare n'ête frappé d'aucune incompatibilité par la législation et la
            réglementation en vigueur.

        </div>
        <br><br><br><br><br><br><br><br>
    </div>



    <table style="width: 100%" cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4"></td>
            <td colspan="2" style="text-align: right;width:40%">
                <table>
                    <tr>
                        <td style="text-align: center">
                            <p style="text-align: center">
                                <span style="text-decoration: underline">M. H MEDDAHI</span>
                                <br>
                                Commissaire Aux Comptes
                            </p>
                        </td>
                    </tr>
                </table>


            </td>
        </tr>
    </table>



    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci iure illo cum optio a omnis magnam corporis
        dolorem necessitatibus voluptas voluptates voluptate voluptatibus consequuntur eos nihil facere, temporibus odio
        dolorum.
        Totam, error? Quaerat rerum aperiam explicabo culpa maxime earum repellat illo quas eos, animi sunt nostrum
        deleniti totam error? Expedita esse sint suscipit tempora non sequi quam odio beatae architecto.
        Cumque amet vitae expedita consequatur. Eos hic mollitia molestias pariatur maxime corporis, aut optio quo
        incidunt itaque quod excepturi facere porro vitae blanditiis quaerat odio? Optio autem adipisci beatae eos?
        Eaque minus quia cumque vero repudiandae, provident sequi ipsum voluptates tempora? Debitis, dolorem. Atque hic
        quaerat soluta doloremque. Aspernatur similique ex eos vero architecto eum mollitia quibusdam earum ducimus
        enim.
        Harum totam soluta, praesentium dolores quisquam veritatis. Explicabo incidunt, distinctio beatae nisi, omnis
        sed dicta, in nostrum quaerat officiis accusantium repudiandae at labore? Iusto, rem aliquid. Quasi error ipsam
        voluptatum?
        Doloribus ipsam pariatur, fugit nulla voluptate suscipit consequatur quaerat rem repellendus ea velit ad magni,
        sapiente nostrum perferendis culpa! Odio quia iure facere dicta corporis ratione reprehenderit vero culpa
        laboriosam!
        Sunt soluta rerum dignissimos labore distinctio aliquam doloribus, sequi facere in saepe, ratione ea vel officia
        explicabo quaerat laboriosam dolorem molestias quidem sed veniam perspiciatis eum atque vero? Provident, dicta.
        Veritatis quam, harum aperiam est itaque enim totam tenetur quia omnis soluta minima facere labore voluptatem
        molestias nulla quas dignissimos ipsam voluptate quibusdam iste explicabo cumque! Facere, possimus. Fugiat, ex.
        Aperiam totam dolorem, ut magni nihil, architecto eaque iure reiciendis nemo adipisci ex dicta officiis libero?
        Ducimus aut laboriosam quidem, excepturi, possimus dolores rem iste delectus quibusdam reprehenderit totam
        consectetur!
        Temporibus, sint. Perferendis nobis porro facilis, inventore quaerat placeat provident unde vel. Ab, facilis
        saepe inventore dolorem molestias corrupti itaque necessitatibus vel at laudantium modi, optio laborum libero?
        Consequatur, totam.
        Odio vero mollitia veniam deserunt velit sequi ex omnis, quasi aliquam molestias architecto, rerum laborum quia
        modi hic labore libero repellat vitae repudiandae. Est fuga in amet odit itaque assumenda!
        Quaerat veniam, repellendus fuga assumenda officiis dolores sequi laudantium sint! Quod ut adipisci veniam
        deserunt voluptates blanditiis cum repellendus maxime sapiente necessitatibus facere, dignissimos enim possimus
        similique illum ipsam! Eaque!
        Reiciendis repellat necessitatibus magnam. Exercitationem libero quos hic necessitatibus asperiores, impedit
        consequuntur, voluptatem maxime iure deleniti commodi id consequatur magnam autem modi fugiat velit nobis
        quibusdam qui, officiis eligendi odio!
        Consequuntur impedit harum aperiam facere a cumque eius tenetur. Praesentium unde dicta quos, eius itaque, omnis
        ea in quisquam nemo harum sequi aliquam similique a labore sit, voluptatem deleniti tenetur.
        Magnam eaque ullam vel sed fugiat molestiae, nemo eum labore? Dolores cupiditate quaerat exercitationem placeat
        cum veritatis molestiae eaque, aperiam distinctio ad nulla debitis, labore hic numquam perferendis unde
        corrupti!
        Facere quae odit architecto inventore sint neque saepe qui blanditiis ullam nisi officiis excepturi assumenda ea
        repellendus dolorum fugiat cumque asperiores voluptas, quis dolorem dolor eius at dolore. Odit, harum?
        Provident, aliquam repellendus. Placeat quibusdam accusamus consectetur vel id impedit, voluptatum officia quod
        dolorem similique ipsam earum commodi eligendi facere odit et, sed laboriosam cum culpa? Perspiciatis illum ut
        dolore?
        Repellat, ab vitae. Explicabo earum, incidunt eius sequi molestiae vitae odio culpa quasi repellat delectus nisi
        voluptates laboriosam amet maiores saepe porro ut minus, officiis consequuntur enim accusamus? Similique, eius.
        Repudiandae dolores delectus cupiditate doloremque ipsa debitis rerum voluptatibus expedita unde assumenda,
        deserunt harum facilis eveniet deleniti voluptatem culpa! Odio corporis error, eaque temporibus nesciunt
        eligendi commodi enim aliquam consectetur.
        Recusandae minima quod sunt. Labore qui sed, itaque eum tenetur dignissimos ab quidem unde obcaecati suscipit
        minima? Accusamus nostrum exercitationem incidunt enim. Quam nostrum modi voluptates porro ratione cumque autem?
        Cupiditate odit velit totam, molestias magni fugit corrupti dicta deleniti assumenda quo ab vitae voluptatem a
        repudiandae perspiciatis ullam possimus incidunt adipisci earum debitis in ea sint nostrum. Sed, quas!
        Nihil quisquam optio veritatis eius exercitationem, eligendi dolor quidem commodi sit! Accusamus atque rerum
        quod odit adipisci, earum expedita numquam ad eos deserunt nam facere dolor id repellat qui ratione!
        Eaque, consectetur sequi error et aliquid sapiente officia facilis illo. Error, ea labore. Omnis eius facilis
        aspernatur sunt odit ut quaerat, quod, quos alias voluptas, nostrum architecto consequuntur? Laudantium, ut.
        Et perspiciatis nesciunt aspernatur inventore repudiandae? Error voluptatibus pariatur, velit harum deserunt
        placeat incidunt aut corporis, nihil ex at ad molestiae amet dolore cupiditate autem sapiente doloribus eos
        dignissimos eligendi.
        Aliquam, saepe soluta aspernatur quae iste cupiditate consectetur quidem tempora accusamus magni ullam eaque sed
        earum ex placeat sapiente aliquid qui maiores repudiandae deleniti culpa molestiae impedit quasi! Ut, tempore!
        Magni blanditiis doloribus quo? Sapiente optio eveniet iusto maiores autem quas repellat, quia aut pariatur
        beatae, id consequuntur nobis vero hic cum. Repellendus aspernatur voluptatum quas in dignissimos quibusdam
        placeat.
        Nam corporis rerum magnam et adipisci error voluptatem praesentium aspernatur necessitatibus alias ut fugit a
        enim delectus perferendis vero incidunt, laboriosam quibusdam. Fuga possimus quibusdam adipisci in molestias cum
        minus.
        Autem similique vel sequi omnis totam provident aliquid deserunt ut aliquam necessitatibus! Impedit sapiente
        voluptate fuga soluta. Nesciunt quasi illum quo fuga saepe quisquam, impedit quos, dolore perferendis maiores
        veritatis.
        Adipisci itaque optio molestias explicabo aut! Optio nemo aliquid sequi officiis quia eveniet blanditiis, amet
        exercitationem harum esse rem unde vero pariatur nulla sapiente, libero dolores cumque quos ut magnam.
        Quo nemo voluptas placeat nihil laborum voluptatibus? Nemo dolorem deserunt ab? Debitis, laborum distinctio et
        adipisci, quidem numquam iure non eum atque dolor incidunt ducimus ipsa eveniet minima, dolorem odit?
        Nemo quidem, omnis velit aspernatur voluptatem possimus magni accusantium architecto ipsa, natus doloribus dicta
        eveniet et aperiam molestias, amet iusto? Dolores, itaque quam! Deserunt magnam quidem voluptate nam doloremque.
        Modi.
        Ratione aliquid veritatis fugit at consequuntur quae quasi et animi optio. Tempora fugiat dolorem quasi, aliquam
        eveniet vitae reiciendis omnis, eos qui possimus assumenda ducimus. A molestiae nulla maxime culpa!
        Voluptates, nesciunt possimus eveniet eaque dicta veniam accusamus expedita cum qui hic ut itaque error ab
        facere voluptatum rem pariatur reiciendis molestias id? Iusto dolor qui soluta minima deleniti distinctio!
        Sit voluptatibus eos quaerat, aspernatur voluptates praesentium et. Facilis expedita accusantium est nulla cum
        odio similique quam. Id, adipisci minima perspiciatis cum quam ab quae est atque animi laudantium assumenda.
        Saepe fuga quae dignissimos asperiores consequuntur non soluta, commodi facilis iusto distinctio assumenda
        eveniet a ut rem perspiciatis repellat pariatur nostrum. Cumque quibusdam culpa facilis veritatis veniam
        dignissimos doloremque perspiciatis?
        Molestiae quae officiis laudantium ratione incidunt iure! Sunt ex laudantium autem ipsa veritatis officiis
        repellendus adipisci id ullam est, voluptate numquam laboriosam dolores accusamus quaerat ducimus blanditiis
        inventore aut accusantium?
        Praesentium illo at officia quo enim, quia accusantium reprehenderit repellat? Provident voluptatem sit eos nam
        illo numquam, distinctio nostrum saepe dolore doloremque dolorem rem cum ea ducimus voluptas unde? Adipisci!
        Voluptates excepturi quibusdam magni, at animi alias delectus illum id atque ipsum mollitia ut corrupti, nisi
        repellat minima esse, nostrum blanditiis? Itaque sed assumenda enim exercitationem dolore repellendus est
        consectetur.
        Ab veritatis nihil, at ex inventore maxime vel numquam, suscipit, perferendis possimus officia sequi. Iusto
        eveniet dolorem eius officiis. Ullam, fugiat blanditiis veniam quia dolorum perferendis temporibus accusantium
        accusamus nisi?
        Saepe autem eos culpa amet alias molestiae, exercitationem ratione delectus quam excepturi assumenda temporibus
        nam minus deserunt nobis consequatur nulla voluptas esse est aspernatur optio placeat voluptatem dolores
        nesciunt. Maxime!
        Doloribus eaque error nihil ea natus, quasi amet asperiores nisi suscipit dignissimos velit cum molestias
        repellendus expedita, repudiandae consequuntur? Numquam temporibus ipsam tenetur veniam laborum voluptatem,
        doloremque voluptates magnam saepe?
        Voluptatibus reiciendis officia beatae nihil molestiae aliquid quae placeat eligendi optio ipsa illum, vel neque
        sit incidunt asperiores iusto magnam quos quam saepe itaque assumenda laudantium? Temporibus reprehenderit
        magnam dicta.
        Nisi sit at beatae perspiciatis praesentium, placeat optio eos obcaecati recusandae ex possimus, quod error
        temporibus repellendus, consequatur laudantium vel cumque porro distinctio modi omnis molestiae? Perferendis
        obcaecati eum sed.
        Quasi voluptate a officiis veritatis eius voluptatum repellat dolores culpa magnam et enim consectetur soluta
        esse veniam expedita odio, nam, accusantium fugit omnis quas illum maxime porro? Ab, aliquam iusto.
        Laboriosam fugit dolorem enim obcaecati doloremque mollitia laudantium odit ad, laborum cum, veritatis quia
        ipsum rerum aperiam asperiores rem maiores, temporibus sunt incidunt sequi necessitatibus. Libero eius cumque
        obcaecati neque.
        Sapiente modi ducimus inventore labore, quod at voluptates sequi quo esse cumque dolorum, dolores reprehenderit
        ut soluta, impedit ratione aliquid porro? Fuga nostrum ipsam facilis architecto hic reprehenderit, veritatis
        nisi.
        Consectetur quae assumenda eum illo. Quaerat illo voluptatibus dolore culpa impedit doloribus consequuntur vel?
        Explicabo, quas harum id corporis, dolorum, veniam molestiae fugiat non ratione beatae fuga quibusdam ipsum
        iusto.
        Perferendis blanditiis laboriosam harum! Perferendis temporibus sit repellat odit assumenda id, provident quis!
        Accusantium enim consectetur sit ex iure quisquam sed autem quidem, quasi quam necessitatibus corrupti officiis
        provident voluptatibus?
        Maxime necessitatibus dolore, ipsam ducimus est quisquam aperiam, odit temporibus blanditiis magni eum voluptate
        officia, aliquam sapiente nesciunt? Necessitatibus quia obcaecati natus eius, repellat rerum ullam itaque
        quisquam ab aliquid?
        Possimus, recusandae tempora iusto ratione fuga incidunt commodi, voluptates aliquam explicabo earum autem,
        corrupti sapiente dicta ut ab cum porro atque tempore? Vitae, veniam quisquam? Nihil ipsa cupiditate a
        assumenda?
        Odit porro aspernatur cupiditate deserunt, ipsa possimus quis placeat sit similique quos temporibus blanditiis
        excepturi id repellat at laboriosam obcaecati alias quo quas commodi hic explicabo esse amet suscipit. Commodi.
        Ratione numquam a magnam iusto labore non quibusdam excepturi. Sunt laboriosam accusantium quod numquam ut,
        distinctio quas at temporibus quasi perspiciatis adipisci quia eos consequuntur, cupiditate itaque animi fuga
        eaque.
        Fugiat deserunt soluta eius adipisci ullam sunt aspernatur est repellat eligendi. Blanditiis nostrum eos cum
        sunt ratione, reiciendis velit. Excepturi praesentium pariatur doloremque culpa veritatis, enim illo nemo vel.
        Nemo?
        Dolore aliquid dolorum consectetur odio modi delectus, quibusdam quam eligendi? Sapiente delectus consequuntur
        libero quia alias perspiciatis! Expedita modi optio veniam! Officia aliquam praesentium voluptatibus, at numquam
        hic delectus in.
        Atque minus voluptatum modi cumque error impedit possimus neque, ullam aliquid recusandae non, sit sint
        distinctio beatae, hic repellat delectus veritatis explicabo deserunt! Ipsum eos neque dolores temporibus
        blanditiis vitae.
        Dolor, ipsam error delectus asperiores vero ipsum doloremque illum odio corrupti minima numquam iusto nam
        eveniet nihil soluta, illo at sapiente impedit eos fugit? Ipsam adipisci expedita quaerat ipsum maiores?
        Est dolores ad voluptatibus ab voluptates sunt cupiditate aliquam distinctio accusantium atque, adipisci
        delectus! Optio velit, doloremque pariatur ad ipsa iste totam tempora minima autem eius recusandae, labore cum
        soluta.
        Minima et, quam fugit consequuntur fuga iste architecto cum, ipsum aliquam soluta a praesentium corrupti omnis
        quo cupiditate similique pariatur in reiciendis est suscipit ab sapiente! Aperiam magni libero debitis.
        Quam accusantium iure ab neque fuga rerum maxime laudantium consequatur amet tempore mollitia, adipisci
        repudiandae delectus tempora cum labore possimus deserunt aliquid qui quod aspernatur! A perspiciatis obcaecati
        saepe possimus!
        Facilis labore eum nobis cum praesentium vitae excepturi beatae aut omnis sunt! Commodi vel est unde nihil
        aliquid nemo cupiditate eius harum libero, culpa cum non? Nesciunt modi impedit quaerat.
        Labore est quos tempore at dolorem obcaecati laborum, asperiores, quibusdam quo mollitia ipsam iure nemo
        voluptate id dignissimos aliquid. Error officiis asperiores repudiandae ea laborum nesciunt vel saepe ad et?
        Hic ex minima vel maiores, pariatur error debitis iste expedita placeat? Dignissimos nulla harum numquam tenetur
        officiis rerum, omnis quos, tempora reiciendis dolorem repellendus pariatur qui quas vel expedita magni.
        Eaque doloribus repudiandae eius pariatur optio, dolore magnam ipsa distinctio quidem recusandae. Saepe natus,
        assumenda sit quisquam corrupti ratione fugit veniam vero nisi voluptas enim, delectus repellendus quam maiores
        ea.
        Ipsa ducimus quos quasi aperiam nam dicta, dignissimos sunt ullam sit vel, modi repudiandae quo itaque
        distinctio perferendis recusandae reiciendis assumenda necessitatibus! Perspiciatis, quod sequi. Voluptatibus
        voluptas nulla ut reiciendis.
        Deserunt, eveniet non? Explicabo voluptatem atque rem quis inventore nostrum, eaque libero vel beatae maiores
        quos quae amet id pariatur dolore sunt nihil soluta eos aliquam! Itaque repellat officia eos.
        Aspernatur tenetur optio quae cupiditate rem, pariatur a odio adipisci. Laudantium quam eveniet unde recusandae
        deleniti repellendus quasi aspernatur vitae fugiat eius, quidem sequi labore ex, amet delectus, officia et.
        Perspiciatis unde, nesciunt iusto veritatis expedita provident officiis? Impedit ratione hic a minima? Omnis,
        veniam? Ipsa iusto perspiciatis nulla explicabo molestiae nostrum quisquam atque natus commodi facere, vero
        consectetur magnam!
        Culpa repudiandae vitae, odio fugit distinctio neque qui, eaque quod perferendis consequatur tempora amet
        voluptatibus necessitatibus. Labore, cupiditate ratione veniam asperiores ex omnis, quia, voluptatem placeat
        tempore similique et id!
        Voluptas nostrum hic facilis maxime ad alias officia quae culpa minima velit repellendus saepe placeat adipisci
        minus incidunt maiores et ipsum dolor ea optio, rem aut corporis. Est, labore sint!
        Est magnam laboriosam minus vel, quia, tempora, distinctio aliquid voluptatum perferendis quasi omnis! Nostrum
        sunt asperiores sit ipsam, tempora molestias ratione, dolor, architecto vitae a aliquam quasi porro non qui?
        Iste quia, libero animi ea dolorem iusto in aperiam corrupti iure. Unde ullam facilis error voluptatum laborum
        impedit minus reiciendis? Ut incidunt voluptates praesentium cum dolorum cupiditate, aspernatur error
        repudiandae.
        Et deserunt rem explicabo ut eum non nisi voluptatum aut ipsam voluptate, est expedita, dolorum laborum minus
        qui inventore sequi omnis? Facere dolore quis ullam odit saepe, adipisci sequi optio!
        Assumenda eaque voluptatibus sit dolorum? Expedita voluptates quidem alias consequuntur doloribus illum sapiente
        sequi optio nihil accusantium, fugiat tempora architecto commodi dolore minima, quasi nesciunt, ratione eum esse
        aliquid vitae.
        Hic tempora, non possimus, quo excepturi quidem amet doloribus dolores rem in dolorum nam quis dicta minima,
        quae at. Aliquam officiis eligendi repudiandae ipsa perferendis sequi non dolore dolores pariatur.
        Voluptatibus neque nisi aspernatur rerum, doloribus deleniti laborum magnam consequuntur? Esse, odio, totam
        blanditiis, sequi fuga ut animi dolores natus corrupti cupiditate quibusdam modi repellendus! Non,
        exercitationem. Earum, adipisci voluptatum?
        Necessitatibus nihil officiis sed reiciendis quis dicta est nesciunt illo vel eum ut facilis, voluptates
        aspernatur numquam asperiores laborum dolore id esse porro aut voluptate totam. Alias quia hic temporibus.
        Quibusdam, reprehenderit corrupti sapiente omnis exercitationem ab accusantium laudantium atque dignissimos ut
        optio dolore dolorum ipsum a cum soluta, nemo et? Earum est non voluptates eius laboriosam. Cumque, iusto totam?
        Blanditiis alias, reprehenderit ea molestiae adipisci assumenda fugiat voluptatem quaerat sunt veniam corrupti
        dicta reiciendis ipsam praesentium laboriosam iusto labore sequi exercitationem illum explicabo commodi ipsa
        unde? Unde, voluptas sunt!
        Atque, tenetur velit. Rerum, incidunt ab. Consequuntur suscipit, voluptatum blanditiis impedit quaerat
        repudiandae quas quae explicabo ex. Rerum voluptate eius unde modi nostrum error quas totam facere? Mollitia,
        soluta eaque.
        Sunt veritatis suscipit, exercitationem esse quo officiis dicta temporibus, nisi debitis ea consequatur eligendi
        dignissimos labore ratione tenetur facilis doloremque aut reprehenderit laudantium quisquam, nulla quia nesciunt
        accusamus magni! Doloremque!
        Vero ratione pariatur iste ipsam, enim voluptates suscipit explicabo nisi quidem quisquam molestias ad accusamus
        et, cum nulla. Nulla explicabo itaque corporis, maiores exercitationem culpa tempore molestiae quos assumenda
        dolores!
        Sit veniam a doloribus atque porro debitis qui quisquam perferendis, ea aliquam commodi. Nisi, quibusdam in
        facere a vero dicta sed. Laborum earum similique dolor ea, soluta dolore vitae at!
        Magnam nihil est eum obcaecati, molestiae animi natus rerum velit in pariatur maxime suscipit harum. Blanditiis
        obcaecati, doloribus rerum, voluptate, nam cupiditate magni voluptatem expedita saepe laudantium molestiae iure?
        Ratione!
        Saepe obcaecati reiciendis illum perferendis ex odit sunt numquam impedit dolore, suscipit repellendus nesciunt
        pariatur. Veritatis, itaque nostrum nam error dicta atque dignissimos quo ea distinctio. Alias laudantium sit
        impedit.
        Reiciendis id tempora dolorem rem natus, libero quibusdam veritatis dolore illo. Tempore provident reprehenderit
        dolor repudiandae ullam doloribus harum quam ut, doloremque architecto aperiam, asperiores natus nobis, aliquid
        veritatis! Repudiandae.
        Vitae aspernatur sit praesentium itaque voluptates! Id incidunt aliquid fugiat ullam est libero. Optio,
        recusandae? Voluptas quam adipisci rerum deserunt omnis cupiditate pariatur vel voluptatem animi suscipit.
        Atque, eaque provident?
        Molestias nihil cum voluptatem, quis tempora ratione iste doloremque. Vel repellendus ducimus doloremque tempora
        perferendis itaque provident sapiente eius blanditiis aperiam earum, cumque id soluta voluptate, est nam,
        nesciunt placeat?
        Sint dolorum debitis iure unde obcaecati esse aspernatur inventore consequatur a quas non aliquam eaque saepe
        delectus modi facilis, laborum illo aliquid, dolorem nemo! Veniam tempore consequuntur provident exercitationem
        praesentium.
        Nulla, pariatur nemo harum assumenda dolor, suscipit minima similique eaque tenetur eligendi quod magni
        architecto perspiciatis magnam doloribus facere nobis. Neque non minus amet, rerum ipsam blanditiis alias
        maxime? Quis.
        Ipsam accusamus eum nihil vero totam commodi maxime rem, quo debitis, sint consequatur illum excepturi minus
        voluptas. Dolorem necessitatibus, provident accusamus maxime harum ab voluptates molestias debitis,
        consequuntur, quos vitae?
        Tenetur repudiandae doloremque et doloribus, possimus enim reiciendis odio molestias quam eaque fugit libero
        magnam eius id sint! Officiis incidunt voluptates dolorum expedita cum animi alias, fugiat mollitia deserunt
        laudantium!
        Eveniet aspernatur quos debitis. Fuga aut at fugiat, sapiente mollitia quidem cumque iusto iste minus maiores
        dignissimos tenetur optio dicta corrupti. Esse velit aliquam consequuntur numquam labore debitis accusantium
        maiores.
        Molestiae, omnis perferendis molestias iure, minima suscipit ipsa soluta reprehenderit voluptatum unde porro,
        consequuntur sed at aut asperiores quod eius aspernatur deleniti harum ipsum est quos et. Odio, provident cum.
        Repellendus nesciunt explicabo voluptatem consequuntur, corporis expedita ipsa, soluta quo vitae dolorem
        deleniti iure quas ad ducimus accusantium perferendis quae dolorum fugiat doloremque officia! Delectus itaque
        saepe in atque nulla.
        Deserunt illo quas recusandae ratione quisquam dicta sit laudantium est omnis eos accusamus excepturi quia enim
        blanditiis perspiciatis dolorum quidem aut voluptates obcaecati quod temporibus, aspernatur pariatur velit!
        Consectetur, placeat.
        Sunt suscipit ducimus eum impedit eveniet, labore, deleniti perspiciatis, soluta voluptates porro repellendus
        distinctio explicabo asperiores expedita et ipsum non! Cum aliquid, est natus placeat deserunt eius neque enim
        quaerat?
        Dolore facere dignissimos corporis recusandae hic, ratione nemo blanditiis voluptates cupiditate cum! Delectus
        quibusdam quisquam, quidem magnam, sed odio in laboriosam ratione eaque tempore eligendi illum aliquam esse
        vitae debitis?
        Facere minus exercitationem perspiciatis molestias placeat quia eum eos laudantium dolore officia totam
        perferendis velit quos fuga neque molestiae officiis hic voluptates quibusdam a, fugit accusantium atque
        pariatur vero. Accusamus.
        Officiis eaque quibusdam consequatur, distinctio nam suscipit, porro tenetur temporibus perspiciatis natus
        perferendis, tempore magnam cupiditate et explicabo dolorem iste! Officia animi eum non culpa. Neque labore
        molestias praesentium repellendus.
        Quas, tempora dicta aut odit numquam veniam culpa assumenda nostrum dolore fugiat accusantium blanditiis
        incidunt in adipisci quisquam recusandae, distinctio corporis maxime ab repellendus. Nesciunt beatae debitis
        praesentium aliquam veniam.</div>

    <footer style="position: fixed; bottom: 5px">{PAGENO}</footer>
</body>

</html>
