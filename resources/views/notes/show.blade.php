@extends('layouts.app')

@section('content')



        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <?php
                    $icons = ['fa-adjust', 'fa-anchor', 'fa-archive', 'fa-area-chart', 'fa-arrows', 'fa-arrows-h', 'fa-arrows-v', 'fa-asterisk', 'fa-at', 'fa-automobile', '(alias)', 'fa-balance-scale', 'fa-ban', 'fa-bank', '(alias)', '', 'fa-bar-chart', 'fa-bar-chart-o', '(alias)', 'fa-barcode', 'fa-bars', 'fa-battery-0', '(alias)', 'fa-battery-1', '(alias)', 'fa-battery-2', '(alias)', 'fa-battery-3', '(alias)', 'fa-battery-4', '(alias)', 'fa-battery-empty', 'fa-battery-full', 'fa-battery-half', 'fa-battery-quarter', 'fa-battery-three-quarters', '', 'fa-bed', 'fa-beer', 'fa-bell', 'fa-bell-o', 'fa-bell-slash', 'fa-bell-slash-o', 'fa-bicycle', 'fa-binoculars', 'fa-birthday-cake', 'fa-bolt', 'fa-bomb', 'fa-book', 'fa-bookmark', 'fa-bookmark-o', 'fa-briefcase', 'fa-bug', 'fa-building', 'fa-building-o', 'fa-bullhorn', 'fa-bullseye', 'fa-bus', 'fa-cab', '(alias)', '', 'fa-calculator', 'fa-calendar', 'fa-calendar-check-o', '', 'fa-calendar-minus-o', '', 'fa-calendar-o', 'fa-calendar-plus-o', 'fa-calendar-times-o', '', 'fa-camera', 'fa-camera-retro', 'fa-car', 'fa-caret-square-o-down', '', 'fa-caret-square-o-left', '', 'fa-caret-square-o-right', '', 'fa-caret-square-o-up', '', 'fa-cart-arrow-down', 'fa-cart-plus', 'fa-cc', 'fa-certificate', 'fa-check', 'fa-check-circle', 'fa-check-circle-o', 'fa-check-square', 'fa-check-square-o', 'fa-child', 'fa-circle', 'fa-circle-o', 'fa-circle-o-notch', 'fa-circle-thin', 'fa-clock-o', 'fa-clone', 'fa-close', '(alias)', '', 'fa-cloud', 'fa-cloud-download', 'fa-cloud-upload', 'fa-code', 'fa-code-fork', 'fa-coffee', 'fa-cog', 'fa-cogs', 'fa-comment', 'fa-comment-o', 'fa-commenting', 'fa-commenting-o', 'fa-comments', 'fa-comments-o', 'fa-compass', 'fa-copyright', 'fa-creative-commons', '', 'fa-credit-card', 'fa-crop', 'fa-crosshairs', 'fa-cube', 'fa-cubes', 'fa-cutlery', 'fa-dashboard', '(alias)', 'fa-database', 'fa-desktop', 'fa-diamond', 'fa-dot-circle-o', 'fa-download', 'fa-edit', '(alias)', '', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-envelope', 'fa-envelope-o', 'fa-envelope-square', 'fa-eraser', 'fa-exchange', 'fa-exclamation', 'fa-exclamation-circle', '', 'fa-exclamation-triangle', '', 'fa-external-link', 'fa-external-link-square', '', 'fa-eye', 'fa-eye-slash', 'fa-eyedropper', 'fa-fax', 'fa-feed', '(alias)', '', 'fa-female', 'fa-fighter-jet', 'fa-file-archive-o', 'fa-file-audio-o', 'fa-file-code-o', 'fa-file-excel-o', 'fa-file-image-o', 'fa-file-movie-o', '(alias)', 'fa-file-pdf-o', 'fa-file-photo-o', '(alias)', 'fa-file-picture-o', '(alias)', 'fa-file-powerpoint-o', '', 'fa-file-sound-o', '(alias)', 'fa-file-video-o', 'fa-file-word-o', 'fa-file-zip-o', '(alias)', 'fa-film', 'fa-filter', 'fa-fire', 'fa-fire-extinguisher', '', 'fa-flag', 'fa-flag-checkered', 'fa-flag-o', 'fa-flash', '(alias)', '', 'fa-flask', 'fa-folder', 'fa-folder-o', 'fa-folder-open', 'fa-folder-open-o', 'fa-frown-o', 'fa-futbol-o', 'fa-gamepad', 'fa-gavel', 'fa-gear', '(alias)', '', 'fa-gears', '(alias)', '', 'fa-gift', 'fa-glass', 'fa-globe', 'fa-graduation-cap', 'fa-group', '(alias)', '', 'fa-hand-grab-o', '(alias)', 'fa-hand-lizard-o', 'fa-hand-paper-o', 'fa-hand-peace-o', 'fa-hand-pointer-o', 'fa-hand-rock-o', 'fa-hand-scissors-o', 'fa-hand-spock-o', 'fa-hand-stop-o', '(alias)', 'fa-hdd-o', 'fa-headphones', 'fa-heart', 'fa-heart-o', 'fa-heartbeat', 'fa-history', 'fa-home', 'fa-hotel', '(alias)', '', 'fa-hourglass', 'fa-hourglass-1', '(alias)', 'fa-hourglass-2', '(alias)', 'fa-hourglass-3', '(alias)', 'fa-hourglass-end', 'fa-hourglass-half', 'fa-hourglass-o', 'fa-hourglass-start', 'fa-i-cursor', 'fa-image', '(alias)', '', 'fa-inbox', 'fa-industry', 'fa-info', 'fa-info-circle', 'fa-institution', '(alias)', 'fa-key', 'fa-keyboard-o', 'fa-language', 'fa-laptop', 'fa-leaf', 'fa-legal', '(alias)', '', 'fa-lemon-o', 'fa-level-down', 'fa-level-up', 'fa-life-bouy', '(alias)', 'fa-life-buoy', '(alias)', 'fa-life-ring', 'fa-life-saver', '(alias)', 'fa-lightbulb-o', 'fa-line-chart', 'fa-location-arrow', 'fa-lock', 'fa-magic', 'fa-magnet', 'fa-mail-forward', '(alias)', 'fa-mail-reply', '(alias)', 'fa-mail-reply-all', '(alias)', 'fa-male', 'fa-map', 'fa-map-marker', 'fa-map-o', 'fa-map-pin', 'fa-map-signs', 'fa-meh-o', 'fa-microphone', 'fa-microphone-slash', '', 'fa-minus', 'fa-minus-circle', 'fa-minus-square', 'fa-minus-square-o', 'fa-mobile', 'fa-mobile-phone', '(alias)', 'fa-money', 'fa-moon-o', 'fa-mortar-board', '(alias)', 'fa-motorcycle', 'fa-mouse-pointer', 'fa-music', 'fa-navicon', '(alias)', 'fa-newspaper-o', 'fa-object-group', 'fa-object-ungroup', 'fa-paint-brush', 'fa-paper-plane', 'fa-paper-plane-o', 'fa-paw', 'fa-pencil', 'fa-pencil-square', 'fa-pencil-square-o', 'fa-phone', 'fa-phone-square', 'fa-photo', '(alias)', '', 'fa-picture-o', 'fa-pie-chart', 'fa-plane', 'fa-plug', 'fa-plus', 'fa-plus-circle', 'fa-plus-square', 'fa-plus-square-o', 'fa-power-off', 'fa-print', 'fa-puzzle-piece', 'fa-qrcode', 'fa-question', 'fa-question-circle', 'fa-quote-left', 'fa-quote-right', 'fa-random', 'fa-recycle', 'fa-refresh', 'fa-registered', 'fa-remove', '(alias)', 'fa-reorder', '(alias)', 'fa-reply', 'fa-reply-all', 'fa-retweet', 'fa-road', 'fa-rocket', 'fa-rss', 'fa-rss-square', 'fa-search', 'fa-search-minus', 'fa-search-plus', 'fa-send', '(alias)', '', 'fa-send-o', '(alias)', 'fa-server', 'fa-share', 'fa-share-alt', 'fa-share-alt-square', '', 'fa-share-square', 'fa-share-square-o', 'fa-shield', 'fa-ship', 'fa-shopping-cart', 'fa-sign-in', 'fa-sign-out', 'fa-signal', 'fa-sitemap', 'fa-sliders', 'fa-smile-o', 'fa-soccer-ball-o', '(alias)', 'fa-sort', 'fa-sort-alpha-asc', 'fa-sort-alpha-desc', 'fa-sort-amount-asc', 'fa-sort-amount-desc', '', 'fa-sort-asc', 'fa-sort-desc', 'fa-sort-down', '(alias)', 'fa-sort-numeric-asc', '', 'fa-sort-numeric-desc', '', 'fa-sort-up', '(alias)', 'fa-space-shuttle', 'fa-spinner', 'fa-spoon', 'fa-square', 'fa-square-o', 'fa-star', 'fa-star-half', 'fa-star-half-empty', '(alias)', 'fa-star-half-full', '(alias)', 'fa-star-half-o', 'fa-star-o', 'fa-sticky-note', 'fa-sticky-note-o', 'fa-street-view', 'fa-suitcase', 'fa-sun-o', 'fa-support', '(alias)', 'fa-tablet', 'fa-tachometer', 'fa-tag', 'fa-tags', 'fa-tasks', 'fa-taxi', 'fa-television', 'fa-terminal', 'fa-thumb-tack', 'fa-thumbs-down', 'fa-thumbs-o-down', 'fa-thumbs-o-up', 'fa-thumbs-up', 'fa-ticket', 'fa-times', 'fa-times-circle', 'fa-times-circle-o', 'fa-tint', 'fa-toggle-down', '(alias)', 'fa-toggle-left', '(alias)', 'fa-toggle-off', 'fa-toggle-on', 'fa-toggle-right', '(alias)', 'fa-toggle-up', '(alias)', 'fa-trademark', 'fa-trash', 'fa-trash-o', 'fa-tree', 'fa-trophy', 'fa-truck', 'fa-tty', 'fa-tv', '(alias)', 'fa-umbrella', 'fa-university', 'fa-unlock', 'fa-unlock-alt', 'fa-unsorted', '(alias)', 'fa-upload', 'fa-user', 'fa-user-plus', 'fa-user-secret', 'fa-user-times', 'fa-users', 'fa-video-camera', 'fa-volume-down', 'fa-volume-off', 'fa-volume-up', 'fa-warning', '(alias)', 'fa-wheelchair', 'fa-wifi', 'fa-wrench'];

                    $colors=[
                            'bg-red',
                            'bg-yellow',
                            'bg-aqua',
                            'bg-blue',
                            'bg-light-blue',
                            'bg-green',
                            'bg-navy',
                            'bg-teal',
                            'bg-olive',
                            'bg-lime',
                            'bg-orange',
                            'bg-fuchsia',
                            'bg-purple',
                            'bg-maroon',
                            'bg-black'
                    ];
                    $nr=0;
                    ?>
                @foreach ($notes as $row)
                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="<?=$colors[$nr];?>">
                        {{ $row->created_at }}
                      </span>
                    </li>
                            <?php
                                $nr++;
                                if ($nr==15) $nr=0;
                            ?>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa <?php echo $icons[rand(0, 476)]; ?> bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">{{ $row->title }}</a> note</h3>

                            <div class="timeline-body notedesc" id="notedesc{{ $row->id }}">
                                <?=nl2br(htmlspecialchars($row->description));?>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Edit</a>
                                <a class="btn btn-danger btn-xs">Delete</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>

@endsection