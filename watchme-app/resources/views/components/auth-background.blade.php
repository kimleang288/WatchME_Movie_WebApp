<div class="bg-wall" aria-hidden="true">
        @php
            $posters = [
                'https://image.tmdb.org/t/p/w300/1E5baAaEse26fej7uHcjOgEE2t2.jpg',
                'https://image.tmdb.org/t/p/w300/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg',
                'https://image.tmdb.org/t/p/w300/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg',
                'https://image.tmdb.org/t/p/w300/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg',
                'https://image.tmdb.org/t/p/w300/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg',
                'https://image.tmdb.org/t/p/w300/kqjL17yufvn9OVLyXYpvtyrFfak.jpg',
                'https://image.tmdb.org/t/p/w300/5VTN0pR8gcqV3EPUHHfMGnJYxhO.jpg',
                'https://image.tmdb.org/t/p/w300/d5NXSklXo0qyIYkgV94XAgMIckC.jpg',
                'https://image.tmdb.org/t/p/w300/bOMnukAAxDNFRXkxnvPgPNQv24g.jpg',
                'https://image.tmdb.org/t/p/w300/ym1dxyOk4jFcSl4Q2zmRrA5BEEN.jpg',
                'https://image.tmdb.org/t/p/w300/A3n9LCFZRbHVhHYjhNVVDHfqJl8.jpg',
                'https://image.tmdb.org/t/p/w300/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg',
                'https://image.tmdb.org/t/p/w300/iuFNMS8vlodyTOwP0SjhQCLSxNW.jpg',
                'https://image.tmdb.org/t/p/w300/6CoRTJTmijhBLJTUNoVSUNxZMEI.jpg',
            ];
            $cols = 7;
        @endphp
        @for ($c = 0; $c < $cols; $c++)
            <div class="col">
                @for ($r = 0; $r < 6; $r++)
                    <div class="poster">
                        <img src="{{ $posters[($c * 6 + $r) % count($posters)] }}" alt="" loading="lazy">
                    </div>
                @endfor
            </div>
        @endfor
</div>