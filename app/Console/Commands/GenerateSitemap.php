<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Crawl the website and generate a sitemap.xml file';

    public function handle()
    {
        $domain = rtrim(config('app.url'), '/');
        $path = public_path('sitemap.xml');

        try {
            SitemapGenerator::create($domain)
                ->writeToFile($path);

            $this->info("✅ Sitemap generated at: $path");
        } catch (\Exception $e) {
            $this->error("❌ Failed to generate sitemap: " . $e->getMessage());
        }
    }
}
