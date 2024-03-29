<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'adminfilter'   => \App\Filters\AdminFilter::class,
        'kasirfilter'   => \App\Filters\KasirFilter::class,
        'teknisifilter'   => \App\Filters\TeknisiFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // sebelum login controller apa saja yang boleh diakses
            'adminfilter' => [
                'except' => [
                    'Home', 'Home/*',
                    '/',
                ]
            ],
            'kasirfilter' => [
                'except' => [
                    'Home', 'Home/*',
                    '/',
                ]
            ],
            'teknisifilter' => [
                'except' => [
                    'Home', 'Home/*',
                    '/',
                ]
            ]
        ],
        'after' => [
            // setelah login, controller yng bisa diakses :
            'toolbar',
            'adminfilter' => [
                'except' => [
                    'Home', 'Home/*',
                    'Admin', 'Admin/*',
                    'Penjualan', 'Penjualan/*',
                    'Produk', 'Produk/*',
                    'User', 'User/*',
                    'Kategori', 'Kategori/*',
                    'Satuan', 'Satuan/*',
                    'Jasa', 'Jasa/*',
                    'Servis', 'Servis/*',
                    'Laporan', 'Laporan/*',
                    'Supplier', 'Supplier/*',
                    'Pelanggan', 'Pelanggan/*',
                    'Pembelian', 'Pembelian/*',
                    'ReturnBarang', 'ReturnBarang/*',
                    '/',
                ]
            ],
            'kasirfilter' => [
                'except' => [
                    'Home', 'Home/*',
                    'Admin', 'Admin/*',
                    'Penjualan', 'Penjualan/*',
                    'Produk', 'Produk/*',
                    'Kategori', 'Kategori/*',
                    'Satuan', 'Satuan/*',
                    'Laporan', 'Laporan/*',
                    'Supplier', 'Supplier/*',
                    'Pelanggan', 'Pelanggan/*',
                    'Pembelian', 'Pembelian/*',
                    'ReturnBarang', 'ReturnBarang/*',
                    '/',
                ]
            ],
            'teknisifilter' => [
                'except' => [
                    'Home', 'Home/*',
                    '/',
                    'Servis', 'Servis/*',
                    'Admin', 'Admin/*',
                    'Jasa', 'Jasa/*',
                    'Kategori', 'Kategori/*',
                    'Satuan', 'Satuan/*',
                    'Produk', 'Produk/*',
                ]
            ],
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
