<?php

interface Command {
    public function execute();
    public function undo();
}

class CopyCommand implements Command {
    private $editor;
    private $start;
    private $end;
    private $copiedText;

    public function __construct(Editor $editor, $start, $end) {
        $this->editor = $editor;
        $this->start = $start;
        $this->end = $end;
    }

    public function execute() {
        $this->copiedText = $this->editor->copy($this->start, $this->end);
    }

    public function undo() {
        $this->editor->paste($this->start, $this->copiedText);
    }
}

class CutCommand implements Command {
    private $editor;
    private $start;
    private $end;
    private $cutText;

    public function __construct(Editor $editor, $start, $end) {
        $this->editor = $editor;
        $this->start = $start;
        $this->end = $end;
    }

    public function execute() {
        $this->cutText = $this->editor->cut($this->start, $this->end);
    }

    public function undo() {
        $this->editor->paste($this->start, $this->cutText);
    }
}

class PasteCommand implements Command {
    private $editor;
    private $start;
    private $pastedText;

    public function __construct(Editor $editor, $start) {
        $this->editor = $editor;
        $this->start = $start;
    }

    public function execute() {
        $this->pastedText = $this->editor->paste($this->start);
    }

    public function undo() {
        $this->editor->cut($this->start, $this->start + strlen($this->pastedText));
    }
}

