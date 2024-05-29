<?php

namespace App\Filament\Pages;

use App\Settings\DetailsSetting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageDetails extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = DetailsSetting::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Home Page')
                            ->schema([
                                Repeater::make('slider')
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->columnSpanFull()
                                            ->directory('home-page/slider/'.now()->format('Y/m/d'))
                                            ->imageEditor()
                                            ->required(),
                                    ]),
                                Repeater::make('clients')
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory('home-page/slider/'.now()->format('Y/m/d'))
                                            ->imageEditor()
                                            ->required(),
                                    ]),

                                TextInput::make('headerTitle')
                                    ->required(),
                                TextInput::make('headerSubTitle')
                                    ->nullable(),
                                TextInput::make('headerButtonLabel')
                                    ->required(),
                                TextInput::make('headerButtonLink')
                                    ->url()
                                    ->required(),
                                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('headerContent')
                                    ->columnSpanFull()
                                    ->required(),
                                FileUpload::make('HomePageHeaderImage')
                                    ->image()
                                    ->directory(now()->format('Y/m/d'))
                                    ->imageEditor()
                                    ->required(),

                                TextInput::make('HomePageContactUsTitle')
                                    ->required(),
                                TextInput::make('HomePageContactUsSubTitle')
                                    ->required(),
                                Forms\Components\Textarea::make('HomePageContactUsContent')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('About Us')
                            ->columns(2)
                            ->schema([
                                TextInput::make('aboutUsTitle')
                                    ->required(),
                                TextInput::make('aboutUsSubTitle')
                                    ->nullable(),
                                TextInput::make('aboutUsButtonLabel')
                                    ->required(),
                                TextInput::make('aboutUsButtonLink')
                                    ->url()
                                    ->required(),
                                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('aboutUsContent')
                                    ->columnSpanFull()
                                    ->required(),
                                FileUpload::make('aboutUsImage')
                                    ->image()
                                    ->directory(now()->format('Y/m/d'))
                                    ->imageEditor()
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Services')
                            ->columns(2)
                            ->schema([
                                TextInput::make('servicesTitle')
                                    ->required(),
                                TextInput::make('servicesSubTitle')
                                    ->nullable(),
                                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('servicesContent')
                                    ->columnSpanFull()
                                    ->required(),
                                FileUpload::make('servicesImage')
                                    ->image()
                                    ->directory(now()->format('Y/m/d'))
                                    ->imageEditor()
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Industries')
                            ->columns(2)
                            ->schema([
                                TextInput::make('industriesTitle')
                                    ->required(),
                                TextInput::make('industriesSubTitle')
                                    ->nullable(),
                                TextInput::make('industriesButtonLabel')
                                    ->required(),
                                TextInput::make('industriesButtonLink')
                                    ->url()
                                    ->required(),
                                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('industriesContent')
                                    ->columnSpanFull()
                                    ->required(),
                                Repeater::make('industriesList')
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('title')
                                            ->required(),
                                    ]),
                                FileUpload::make('industriesImage')
                                    ->image()
                                    ->directory(now()->format('Y/m/d'))
                                    ->imageEditor()
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Vision')
                            ->columns(2)
                            ->schema([
                                TextInput::make('visionTitle')
                                    ->required(),
                                TextInput::make('visionButtonLabel')
                                    ->required(),
                                TextInput::make('visionButtonLink')
                                    ->url()
                                    ->required(),
                                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('visionContent')
                                    ->columnSpanFull()
                                    ->required(),
                                FileUpload::make('visionImage')
                                    ->image()
                                    ->directory(now()->format('Y/m/d'))
                                    ->imageEditor()
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Comments')
                            ->columns(1)
                            ->schema([
                                Repeater::make('comments')
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->schema([
                                        TextInput::make('from')
                                            ->required(),
                                        TextInput::make('subFrom')
                                            ->nullable(),
                                        Forms\Components\Textarea::make('comment')
                                            ->required(),
                                        FileUpload::make('image')
                                            ->image()
                                            ->directory(now()->format('Y/m/d'))
                                            ->imageEditor()
                                            ->nullable(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
