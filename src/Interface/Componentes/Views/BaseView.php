<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Enums\Constantes;

abstract class BaseView
{
    protected $title;
    private $appColors;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->appColors = [
            'reset' => Constantes::RESET_COLOR,
            'blue' => Constantes::BLUE_COLOR,
            'green' => Constantes::GREEN_COLOR,
            'grey' => Constantes::GREY_COLOR,
            'error' => Constantes::ERROR_COLOR
        ];
    }

    public function run(): void
    {
        $this->render();
    }

    abstract protected function render();

    protected function getTitle(): string
    {
        return $this->title;
    }

    protected function getResetColor()
    {
        return $this->appColors['reset'];
    }

    protected function getBlueColor()
    {
        return $this->appColors['blue'];
    }

    protected function getGreenColor()
    {
        return $this->appColors['green'];
    }

    protected function getGreyColor()
    {
        return $this->appColors['grey'];
    }

    protected function getErrorColor()
    {
        return $this->appColors['error'];
    }

    protected function showTitle(): void
    {
        $title = $this->getTitle();

        if (empty($title)) {
            $title = Constantes::APP_NAME;
        }

        $blue = $this->getBlueColor();
        $reset = $this->getResetColor();
        echo "{$blue}{$title}{$reset}\n";
    }

    protected function showError($message): void
    {
        $error = $this->getErrorColor();
        $reset = $this->getResetColor();
        echo "{$error}{$message}{$reset}\n";
    }

    protected function showSuccess($message)
    {
        $green = $this->getGreenColor();
        $reset = $this->getResetColor();
        echo "{$green}{$message}{$reset}\n";
    }

    protected function showMessage($message)
    {
        $grey = $this->getGreyColor();
        $reset = $this->getResetColor();
        echo "{$grey}{$message}{$reset}\n";
    }
}
