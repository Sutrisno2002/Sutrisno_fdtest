@push('style')
    <style>
        /* Timeline */
        .timeline {
            position: relative;
            display: block;
            margin: 0;
            padding: 10px 0;
        }

        .timeline:after,
        .timeline:before {
            content: " ";
            display: table;
        }

        .timeline:after {
            clear: both;
        }

        .timeline,
        .timeline>li {
            list-style: none;
        }

        .timeline>li:nth-child(even) {
            float: left;
            clear: left;
        }

        .timeline>li:nth-child(odd) {
            float: right;
            clear: right;
        }

        .timeline-line {
            display: inline-block;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            background-color: #eee;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .timeline-line+.timeline-item {
            margin-top: -20px;
        }

        .timeline-group {
            display: block;
            position: relative;
            margin: 20px 0;
            text-align: center;
            float: none !important;
            z-index: 1;
        }

        .timeline-poster {
            margin-top: -20px;
        }

        .timeline-poster .btn-link {
            color: #a1aab0;
        }

        .timeline-poster .btn-link.active,
        .timeline-poster .btn-link:active,
        .timeline-poster .btn-link:focus,
        .timeline-poster .btn-link:hover {
            color: #3e5771;
        }

        .timeline-item {
            position: relative;
            display: inline-block;
            width: 50%;
            padding: 0 30px 20px;
        }

        .timeline-item:nth-child(even):after,
        .timeline-item:nth-child(even):before {
            content: '';
            position: absolute;
            right: 19px;
            top: 10px;
            width: 0;
            height: 0;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            border-left: 12px solid #ccc;
            z-index: 1;
        }

        .timeline-item:nth-child(even):after {
            right: 20px;
            top: 11px;
            border-top: 11px solid transparent;
            border-bottom: 11px solid transparent;
            border-left: 11px solid #fff;
        }

        .timeline-item:nth-child(even)>.timeline-badge {
            right: -6px;
        }

        .timeline-item:nth-child(odd):after,
        .timeline-item:nth-child(odd):before {
            content: '';
            position: absolute;
            left: 19px;
            top: 10px;
            width: 0;
            height: 0;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            border-right: 12px solid #ccc;
            z-index: 1;
        }

        .timeline-item:nth-child(odd):after {
            left: 20px;
            top: 11px;
            border-top: 11px solid transparent;
            border-bottom: 11px solid transparent;
            border-right: 11px solid #fff;
        }

        .timeline-item:nth-child(odd)>.timeline-badge {
            left: -6px;
        }

        .timeline-item.block:nth-child(even),
        .timeline-item.block:nth-child(odd) {
            width: 100%;
            margin-top: 5px;
        }

        .timeline-item.block:nth-child(even):after,
        .timeline-item.block:nth-child(even):before,
        .timeline-item.block:nth-child(odd):after,
        .timeline-item.block:nth-child(odd):before {
            left: 50%;
            right: auto;
            top: -11px;
            border: 0;
            border-left: 12px solid transparent;
            border-right: 12px solid transparent;
            border-bottom: 12px solid #ccc;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .timeline-item.block:nth-child(even):after,
        .timeline-item.block:nth-child(odd):after {
            top: -10px;
            border: 0;
            border-left: 11px solid transparent;
            border-right: 11px solid transparent;
            border-bottom: 11px solid #fff;
        }

        .timeline-item.block:nth-child(even)>.timeline-badge,
        .timeline-item.block:nth-child(odd)>.timeline-badge {
            top: -28px;
            left: 50%;
            right: auto;
            -webkit-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .timeline-item>.timeline-badge {
            position: absolute;
            top: 12px;
            z-index: 1;
        }

        .timeline-item>.timeline-badge>a {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #999;
            border-radius: 24px;
            background-color: #fff;
            text-decoration: none;
            transition: all ease .3s;
        }

        .timeline-item>.timeline-badge>a.active,
        .timeline-item>.timeline-badge>a:active,
        .timeline-item>.timeline-badge>a:focus,
        .timeline-item>.timeline-badge>a:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }

        .timeline-item>.timeline-panel {
            position: relative;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .timeline-item>.timeline-panel:hover .timeline-actions {
            display: block;
        }

        .timeline-actions {
            display: none;
        }

        .timeline-content,
        .timeline-footer,
        .timeline-heading,
        .timeline-liveliness {
            padding: 15px;
        }

        .timeline-heading+.timeline-content {
            padding-top: 0;
        }

        .timeline-date,
        .timeline-email {
            display: inline-flex;
            align-items: center;
            font-size: 12px;
            color: #aaa;
        }

        .timeline-date i,
        .timeline-email i {
            margin-right: .35rem;
        }

        .timeline-embed {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 25px;
            height: 0;
        }

        .timeline-embed .embed-element,
        .timeline-embed embed,
        .timeline-embed iframe,
        .timeline-embed object {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%
        }

        .timeline-img {
            display: block;
            padding: 5px 0;
        }

        .timeline-img.first {
            margin-right: -10px;
        }

        .timeline-img.middle {
            margin-right: -10px;
            margin-left: -10px;
        }

        .timeline-img.last {
            margin-left: -10px;
        }

        .timeline-footer,
        .timeline-liveliness,
        .timeline-resume {
            border-top: 1px solid #eee;
            background-color: #fbfcfc;
        }

        .timeline-footer {
            border-radius: 0 0 5px 5px;
        }

        .timeline-avatar {
            margin-top: -2px;
            margin-right: 10px;
        }

        .timeline-title {
            margin: 0;
            padding: 0;
            font-size: 14px;
            line-height: 1.42857;
            font-weight: 600;
            color: #3e5771;
            text-decoration: none;
        }

        .timeline-title>small {
            display: block;
            font-size: 12px;
            line-height: 1.5;
            color: #a1aab0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .timeline .media {
            border-bottom: 1px solid #eee;
        }

        .timeline .media,
        .timeline .media p {
            font-size: 13px;
        }

        .timeline .media:last-child {
            border-bottom: 0;
        }

        @media (max-width:991px) {
            .timeline {
                padding-left: 15px;
            }

            .timeline-line {
                left: 15px;
            }

            .timeline-group {
                display: inline-block;
                margin-left: 4px;
            }

            .timeline-item {
                width: 100%;
                margin-top: 0 !important;
                padding-right: 10px;
            }

            .timeline-item.block:nth-child(even),
            .timeline-item.block:nth-child(odd) {
                padding-bottom: 0;
            }

            .timeline-item.block:nth-child(even):after,
            .timeline-item.block:nth-child(even):before,
            .timeline-item.block:nth-child(odd):after,
            .timeline-item.block:nth-child(odd):before,
            .timeline-item:nth-child(even):after,
            .timeline-item:nth-child(even):before,
            .timeline-item:nth-child(odd):after,
            .timeline-item:nth-child(odd):before {
                left: 19px;
                top: 10px;
                border: 0;
                border-top: 12px solid transparent;
                border-bottom: 12px solid transparent;
                border-right: 12px solid #ccc;
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }

            .timeline-item.block:nth-child(even):after,
            .timeline-item.block:nth-child(odd):after,
            .timeline-item:nth-child(even):after,
            .timeline-item:nth-child(odd):after {
                left: 20px;
                top: 11px;
                border-top: 11px solid transparent;
                border-bottom: 11px solid transparent;
                border-right: 11px solid #fff;
            }

            .timeline-item.block:nth-child(even)>.timeline-badge,
            .timeline-item.block:nth-child(odd)>.timeline-badge,
            .timeline-item:nth-child(even)>.timeline-badge,
            .timeline-item:nth-child(odd)>.timeline-badge {
                top: 12px;
                left: -6px;
                right: auto;
                -webkit-transform: translate(0, 0);
                transform: translate(0, 0);
            }
        }

        @media (max-width:480px) {
            .timeline {
                padding: 0;
            }

            .timeline-line {
                display: none;
            }

            .timeline-item {
                display: block;
                padding: 0 0 20px !important;
            }

            .timeline-item.block:nth-child(even),
            .timeline-item.block:nth-child(odd),
            .timeline-item:nth-child(even),
            .timeline-item:nth-child(odd) {
                float: none;
                clear: both;
            }

            .timeline-item.block:nth-child(even):after,
            .timeline-item.block:nth-child(even):before,
            .timeline-item.block:nth-child(odd):after,
            .timeline-item.block:nth-child(odd):before,
            .timeline-item.timeline-poster>.timeline-badge,
            .timeline-item:nth-child(even):after,
            .timeline-item:nth-child(even):before,
            .timeline-item:nth-child(odd):after,
            .timeline-item:nth-child(odd):before {
                display: none;
            }

            .timeline-item>.timeline-badge {
                top: -8px !important;
                left: 50% !important;
                margin-left: -6px;
            }
        }

        .wrapkit-content-rtl .timeline-avatar {
            margin-right: 0;
            margin-left: 10px;
        }

        .timeline-heading {
            font-size: 20px;
        }
    </style>
@endpush

<div>
    <ul class="timeline">
        <li class="timeline-line"></li>
        <li class="timeline-group">
            <div class="btn bg-primary"><i class="bx bx-user"></i> Sessions</div>
        </li>
    </ul>
    <ul class="timeline">
        <li class="timeline-line"></li>
        @foreach ($sessions as $session)
            <li class="timeline-item">
                <div class="timeline-badge"><a></a></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        @if ($session->user)
                            {{ $session->user->fullname() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="timeline-date">
                                        <i class="bx bx-envelope"></i>
                                        {{ $session->user->email }}
                                    </small>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <small class="timeline-date">
                                        <i class="bx bx-time"></i>
                                        {{ dateTimeTranslated($session->last_activity, 'D, d M y. H:i') }}
                                    </small>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="timeline-date">
                                        <i class="bx bx-globe-alt"></i>
                                        {{ $session->ip_address }}
                                    </small>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <small class="timeline-date">
                                        <i class="bx bx-time"></i>
                                        {{ dateTimeTranslated($session->last_activity, 'D, d M y. H:i') }}
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="timeline-footer">
                        <small class="text-muted">{{ $session->user_agent }}</small>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <ul class="timeline">
        <li class="timeline-line"></li>
        <li class="timeline-group">

            @if ($sessions->hasMorePages())
                <button class="btn bg-dark" wire:loading.attr="disabled" wire:target="loadMore" wire:click="loadMore">
                    Load More
                    <div class="spinner-border spinner-border-sm" role="status" wire:loading="loadMore"
                         wire:target="loadMore">
                    </div>
                </button>
            @else
                <div class="btn bg-dark disabled">Load More</div>
            @endif
        </li>
    </ul>
</div>
