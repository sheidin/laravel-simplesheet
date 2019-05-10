/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/3.6.3/workbox-sw.js");

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "1.0/architecture/concerns.html",
    "revision": "75580055f5fccb1e25cd5e18fee13311"
  },
  {
    "url": "1.0/architecture/index.html",
    "revision": "db30a2e41de233015837d40ec4c0a088"
  },
  {
    "url": "1.0/architecture/objects.html",
    "revision": "d380813e2064f446051733a0693d3cc5"
  },
  {
    "url": "1.0/exports/collection.html",
    "revision": "697de7e4aba1a4f302a98c9b7ae856d3"
  },
  {
    "url": "1.0/exports/concerns.html",
    "revision": "598007ee886300560d24f437b0bc1270"
  },
  {
    "url": "1.0/exports/export-formats.html",
    "revision": "f126f3ff83cbc9524e3202e4a43f33f3"
  },
  {
    "url": "1.0/exports/exportables.html",
    "revision": "6af1cd0c2e008e947dec9b69ac090ee0"
  },
  {
    "url": "1.0/exports/extending.html",
    "revision": "be645eea80339de34fd02e08c4d10dd1"
  },
  {
    "url": "1.0/exports/from-query.html",
    "revision": "89e213359ec260958d9f4478d405978e"
  },
  {
    "url": "1.0/exports/index.html",
    "revision": "e9b8290cf1c02c9aeba363272193fbfc"
  },
  {
    "url": "1.0/exports/mapping.html",
    "revision": "444200424243f1e2265d2b8cfea479da"
  },
  {
    "url": "1.0/exports/multiple-sheets.html",
    "revision": "9424ed2265667a78c135e911d7ad0ed3"
  },
  {
    "url": "1.0/exports/queued.html",
    "revision": "79829ed13c885f05083b2e147ab9b64f"
  },
  {
    "url": "1.0/exports/store.html",
    "revision": "a30d157062d2af44a127d80a2c037030"
  },
  {
    "url": "1.0/exports/testing.html",
    "revision": "0b9af7adc3825aaccc6c6669599571fb"
  },
  {
    "url": "1.0/getting-started/contributing.html",
    "revision": "af0f466008d832b8d3c79c673ba2f59d"
  },
  {
    "url": "1.0/getting-started/index.html",
    "revision": "9c44f45b4e0f287ae39bdec4de7b6fd5"
  },
  {
    "url": "1.0/getting-started/installation.html",
    "revision": "2070469ebfd7fc19fa4ace37192c35f3"
  },
  {
    "url": "1.0/getting-started/license.html",
    "revision": "3f80fb88020a8c6c612bc484ee9dc6b9"
  },
  {
    "url": "1.0/getting-started/support.html",
    "revision": "d839939b57b3064b505bb445dce7f153"
  },
  {
    "url": "1.0/imports/basics.html",
    "revision": "017e0abe4cfb2e19590c7a9297a7b3f5"
  },
  {
    "url": "1.0/imports/batch-inserts.html",
    "revision": "e5c3e159be2b485688db3b0d972ad12a"
  },
  {
    "url": "1.0/imports/collection.html",
    "revision": "8867a1377f3f619aba28f8001df68452"
  },
  {
    "url": "1.0/imports/concerns.html",
    "revision": "fcc2f380b19e3624602cc29153a56aff"
  },
  {
    "url": "1.0/imports/custom-csv-settings.html",
    "revision": "79b9692a37d8fbba547455b9bb8d040a"
  },
  {
    "url": "1.0/imports/extending.html",
    "revision": "b256e246e6fd19627f55c3fa17a521c3"
  },
  {
    "url": "1.0/imports/heading-row.html",
    "revision": "06829cc780d90f00d8a6297929ccc8b7"
  },
  {
    "url": "1.0/imports/import-formats.html",
    "revision": "23e23587bb918864f9d49b762cd76063"
  },
  {
    "url": "1.0/imports/importables.html",
    "revision": "faff94d5c95aad0e408d7cbd6414d234"
  },
  {
    "url": "1.0/imports/index.html",
    "revision": "94381c81c4d9192a9c16cb170a3158eb"
  },
  {
    "url": "1.0/imports/model.html",
    "revision": "abcb7b14be3a489521faa3ad000f170e"
  },
  {
    "url": "1.0/imports/multiple-sheets.html",
    "revision": "d00c46cd2df5ee959c1d444b213db810"
  },
  {
    "url": "1.0/imports/queued.html",
    "revision": "19ac2afc4ee1762c55f82f895bd8a569"
  },
  {
    "url": "1.0/imports/testing.html",
    "revision": "f5c7a62d3dec0320ae6dcd4024aa8989"
  },
  {
    "url": "1.0/imports/validation.html",
    "revision": "c4d0c1771de3d446570ff1004a1e9eef"
  },
  {
    "url": "1.0/index.html",
    "revision": "531de163f4ee9e1bf402847672f72b57"
  },
  {
    "url": "404.html",
    "revision": "8593bbdf829b8228f26664dd2606f3b3"
  },
  {
    "url": "assets/css/0.styles.4ff61ee7.css",
    "revision": "a184495c1f2d684576db9b38844c86d1"
  },
  {
    "url": "assets/img/search.83621669.svg",
    "revision": "83621669651b9a3d4bf64d1a670ad856"
  },
  {
    "url": "assets/js/10.8217e0b0.js",
    "revision": "7ac1d7f58de53856919b1d11d5d650cd"
  },
  {
    "url": "assets/js/11.fcf7a36e.js",
    "revision": "fa5e89c6206f565abe19b14d6b883a92"
  },
  {
    "url": "assets/js/12.75148aa4.js",
    "revision": "fa40861cee49d20e384d7e56a8e2d358"
  },
  {
    "url": "assets/js/13.14e73595.js",
    "revision": "50413bb52df7dd6928cd8b53ec7707e8"
  },
  {
    "url": "assets/js/14.8619e606.js",
    "revision": "28f55435e3e2a0500c9a3e0e8293f3e6"
  },
  {
    "url": "assets/js/15.238d7867.js",
    "revision": "75c53a8f9530a84bc1dae1150bad1241"
  },
  {
    "url": "assets/js/16.47e6ded9.js",
    "revision": "200f438ec3787df609142f02e439342c"
  },
  {
    "url": "assets/js/17.3f57a59c.js",
    "revision": "869796424fd729f13dd3468a07fe2da6"
  },
  {
    "url": "assets/js/18.b7d12b0a.js",
    "revision": "a43cb9da588e4086d445d693babd0171"
  },
  {
    "url": "assets/js/19.73baa82b.js",
    "revision": "7d9033bb581fea24f7ddf0c94b000e87"
  },
  {
    "url": "assets/js/2.1850a6cb.js",
    "revision": "2a24c54c4fd07926d088173dcbb4081b"
  },
  {
    "url": "assets/js/20.f186e5eb.js",
    "revision": "f2da9aae9d203a213b1318a3128ef89f"
  },
  {
    "url": "assets/js/21.03cd8661.js",
    "revision": "e683879f0e7edfc57159d8a0e39cb4a3"
  },
  {
    "url": "assets/js/22.036b937c.js",
    "revision": "5e42d901157fb5a70c7c9bafa255a4ee"
  },
  {
    "url": "assets/js/23.205cd2d8.js",
    "revision": "7792c8d8d349276692ae0192891f076a"
  },
  {
    "url": "assets/js/24.6f1572b7.js",
    "revision": "64903af30aa77c79d1a13a27a9292da2"
  },
  {
    "url": "assets/js/25.c8a7e8ad.js",
    "revision": "3497975cf69321226dcac4474dacd4ee"
  },
  {
    "url": "assets/js/26.2111e70f.js",
    "revision": "03dea7fd7f49922e0da94d478d71f1f5"
  },
  {
    "url": "assets/js/27.9b20929f.js",
    "revision": "d4e571a19debbcbbcde396214cb4250a"
  },
  {
    "url": "assets/js/28.622b56ad.js",
    "revision": "cd66bb38f16aab3082777765d6be101e"
  },
  {
    "url": "assets/js/29.1e9e4186.js",
    "revision": "559ceb31382bdba6c26fdb8450148316"
  },
  {
    "url": "assets/js/3.4d23fbea.js",
    "revision": "38465f84bc11b9653d2322d04847045f"
  },
  {
    "url": "assets/js/30.fc80578b.js",
    "revision": "3a676e8ddca7535edb13f6cd0189d541"
  },
  {
    "url": "assets/js/31.83f802b2.js",
    "revision": "3fa7b0de52c431ad648d7fa323cb71a9"
  },
  {
    "url": "assets/js/32.54508042.js",
    "revision": "ce028837357901afd942e5f6fae780bb"
  },
  {
    "url": "assets/js/33.7f21ec6e.js",
    "revision": "3f1a980611f83db8a7be110933ab7f27"
  },
  {
    "url": "assets/js/34.18a7a720.js",
    "revision": "763fb3230b6320169467ef88658719e4"
  },
  {
    "url": "assets/js/35.f592dc32.js",
    "revision": "2a14a0ecf6cf4bcca68dbb2ab99b48e4"
  },
  {
    "url": "assets/js/36.125d484d.js",
    "revision": "fce43d51a2695a77ccace95fe6d4ee7c"
  },
  {
    "url": "assets/js/37.67fc5517.js",
    "revision": "4ec13e73d3e6b578443cd03d14f6e5c5"
  },
  {
    "url": "assets/js/38.52137e73.js",
    "revision": "4a987f6ead98577cedbbc5f1057e1786"
  },
  {
    "url": "assets/js/39.fc855bdc.js",
    "revision": "cc3ce866ccbadffa83c40cb2c1b8ce6e"
  },
  {
    "url": "assets/js/4.a5583805.js",
    "revision": "b18c67e54bea050f6a3282c187a178c3"
  },
  {
    "url": "assets/js/40.6a93cca0.js",
    "revision": "fb33f10d3b37fedf5e52d63c3ec6a2f3"
  },
  {
    "url": "assets/js/41.b480f1c5.js",
    "revision": "8fbdac82e68da27eea803b78cc01644c"
  },
  {
    "url": "assets/js/42.afa563dc.js",
    "revision": "343ccfe71ba10be482ff6422849780cb"
  },
  {
    "url": "assets/js/43.893483aa.js",
    "revision": "7d338944936c4a889d16f8dd28097b99"
  },
  {
    "url": "assets/js/5.8a1065a6.js",
    "revision": "5621bc4a9cbb61d9a3af5c51d43f8575"
  },
  {
    "url": "assets/js/6.4f2ee912.js",
    "revision": "208a9c4026130935f67e0364365677b7"
  },
  {
    "url": "assets/js/7.db2faa10.js",
    "revision": "b967189d400abeddf6666b81bc533c28"
  },
  {
    "url": "assets/js/8.e531f9a5.js",
    "revision": "753b69e68899bbc5abc3067a6049b5d7"
  },
  {
    "url": "assets/js/9.d00c7991.js",
    "revision": "0dddc367de798b9d6643c7493e59d087"
  },
  {
    "url": "assets/js/app.7ec92da8.js",
    "revision": "795b1036fdf93ae535ab00b718335327"
  },
  {
    "url": "index.html",
    "revision": "c3bb5a7bc57753e7f9f4662ef5ce457b"
  }
].concat(self.__precacheManifest || []);
workbox.precaching.suppressWarnings();
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
addEventListener('message', event => {
  const replyPort = event.ports[0]
  const message = event.data
  if (replyPort && message && message.type === 'skip-waiting') {
    event.waitUntil(
      self.skipWaiting().then(
        () => replyPort.postMessage({ error: null }),
        error => replyPort.postMessage({ error })
      )
    )
  }
})
