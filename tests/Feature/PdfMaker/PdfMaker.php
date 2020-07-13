<?php

namespace Tests\Feature\PdfMaker;

class PdfMaker
{
    use PdfMakerUtilities;

    protected $data;

    public $design;

    public $html;

    public $document;

    private $xpath;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function design(string $design)
    {
        $this->design = new $design();

        $this->initializeDomDocument();

        return $this;
    }

    public function build()
    {
        // $raw = $this->design->html();

        $this->updateElementProperties($this->data['template']);
        $this->updateVariables($this->data['variables']);

        return $this;
    }

    public function getCompiledHTML()
    {
        return $this->document->saveHTML();
    }
}
