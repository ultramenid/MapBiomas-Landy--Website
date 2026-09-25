<?php

// Shared CMS navigation data: used by the sidebar nav partial (cms.partials.nav)
// and by the breadcrumb trail derived in components/cms-layout.blade.php.

return [
    [
        'label' => 'Overview',
        'items' => [
            ['href' => '/cms/dashboard', 'match' => 'cms/dashboard', 'label' => 'Dashboard', 'icon' => 'M3 3h7v7H3zM14 3h7v7h-7zM14 14h7v7h-7zM3 14h7v7H3z'],
        ],
    ],
    [
        'label' => 'Content',
        'items' => [
            ['href' => '/cms/listnews', 'match' => 'cms/listnews|cms/addnews|cms/editnews|cms/editnews/*|cms/editeksternal|cms/editeksternal/*', 'label' => 'News', 'icon' => 'M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0V9M18 14h-8M15 18h-5M10 6h8v4h-8V6Z'],
            ['href' => '/cms/listfaq', 'match' => 'cms/listfaq|cms/addfaq|cms/editfaq|cms/editfaq/*', 'label' => 'FAQ', 'icon' => 'M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20zM9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3M12 17h.01'],
            ['href' => '/cms/listinfographic', 'match' => 'cms/listinfographic|cms/addinfographic|cms/editinfographic|cms/editinfographic/*', 'label' => 'Infographics', 'icon' => 'M3 3v18h18M7 15l4-6 4 3 5-8'],
            ['href' => '/cms/cmsmural', 'match' => 'cms/cmsmural|cms/addmural|cms/editmural|cms/editmural/*', 'label' => 'Murals', 'icon' => 'M4 4h16v12H4zM8 20h8M12 16v4'],
        ],
    ],
    [
        'label' => 'Pages',
        'items' => [
            ['href' => '/cms/pageabout', 'match' => 'cms/pageabout', 'label' => 'About', 'icon' => 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 2v6h6M16 13H8M16 17H8M10 9H8'],
            ['href' => '/cms/termofuse', 'match' => 'cms/termofuse', 'label' => 'Terms of Use', 'icon' => 'M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20zM12 16v-4M12 8h.01'],
            ['href' => '/cms/pagestatistics', 'match' => 'cms/pagestatistics', 'label' => 'Statistics', 'icon' => 'M18 20V10M12 20V4M6 20v-6'],
            ['href' => '/cms/pageglossary', 'match' => 'cms/pageglossary', 'label' => 'Glossary', 'icon' => 'M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 19.5A2.5 2.5 0 0 0 6.5 22H20V2H6.5A2.5 2.5 0 0 0 4 4.5v15z'],
            ['href' => '/cms/pagerefmap', 'match' => 'cms/pagerefmap', 'label' => 'Reference Map', 'icon' => 'M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13 6-3m-6 3V7m6 10 4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7'],
        ],
    ],
    [
        'label' => 'Data & Downloads',
        'items' => [
            ['href' => '/cms/cmsatbd', 'match' => 'cms/cmsatbd', 'label' => 'ATBD', 'icon' => 'M4 19.5A2.5 2.5 0 0 1 6.5 17H20M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z'],
            ['href' => '/cms/pageaccuracy', 'match' => 'cms/pageaccuracy', 'label' => 'Accuracy Assessment', 'icon' => 'M22 11.08V12a10 10 0 1 1-5.93-9.14M22 4 12 14.01l-3-3'],
            ['href' => '/cms/pagegee', 'match' => 'cms/pagegee', 'label' => 'Google Earth Engine', 'icon' => 'M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20zM2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z'],
            ['href' => '/cms/pagelandsatmosaics', 'match' => 'cms/pagelandsatmosaics', 'label' => 'Landsat Mosaic', 'icon' => 'M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6'],
            ['href' => '/cms/pagecollectionmap', 'match' => 'cms/pagecollectionmap', 'label' => 'Map Collection', 'icon' => 'M9 20l-5.447-2.724A1 1 0 0 1 3 16.382V5.618a1 1 0 0 1 1.447-.894L9 7m0 13 6-3m-6 3V7m6 10 4.553 2.276A1 1 0 0 0 21 18.382V7.618a1 1 0 0 0-.553-.894L15 4m0 13V4m0 0L9 7'],
            ['href' => '/cms/pagefactsheet', 'match' => 'cms/pagefactsheet', 'label' => 'Factsheet', 'icon' => 'M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM14 2v6h6M16 13H8M16 17H8'],
        ],
    ],
];