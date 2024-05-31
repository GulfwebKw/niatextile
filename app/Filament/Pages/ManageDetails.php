<?php

namespace App\Filament\Pages;

use App\Settings\DetailsSetting;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SettingsPage;
use Illuminate\Support\HtmlString;

class ManageDetails extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = DetailsSetting::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Home Page')
                            ->columns(2)
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('title_en')
                                    ->required(),
                                TextInput::make('title_ar')
                                    ->required(),
                                FileUpload::make('video')
                                    ->acceptedFileTypes(['video/mp4'])
                                    ->directory('home-page/video/'.now()->format('Y/m/d'))
                                    ->rules(['file', 'max:992288'])
                                    ->nullable(),
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
                                        TextInput::make('link')
                                            ->url()
                                            ->nullable(),
                                    ]),
                                Forms\Components\Repeater::make('socials')
                                    ->schema([
                                        TextInput::make('link')->required()->url(),
                                        Select::make('icon')
                                            ->required()
                                            ->searchable()
                                            ->options([
                                                'facebook.svg' => 'Facebook',
//                                                'fa-twitter' => 'Twitter',
                                                'instagram.svg' => 'Instagram',
//                                                'fa-linkedin' => 'LinkedIn',
                                                'youtube.svg' => 'YouTube',
//                                                'fa-pinterest' => 'Pinterest',
                                                'snapchat.svg' => 'Snapchat',
                                                'whatsapp.svg' => 'WhatsApp',
//                                                'fa-skype' => 'Skype',
//                                                'fa-telegram' => 'Telegram',
                                            ]),
                                        TextInput::make('help')->nullable(),
                                    ])
                                    ->columnSpanFull()
                                    ->columns(3),
                            ]),
                        Tabs\Tab::make('Instagram')
                            ->columns(2)
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('instagram_username')
                                    ->required(),
                                Forms\Components\Checkbox::make('instagram_active')
                                    ->label('Show latest post of instagram?')
                                    ->nullable(),
                                TextInput::make('instagram_user_id')
                                    ->hint(new HtmlString('Get user id from: <a href="https://instagram.com/username/" target="_blank">https://instagram.com/username/</a>'))
                                    ->nullable(),
                                TextInput::make('instagram_access_token')
                                    ->nullable(),
                                TextInput::make('instagram_cache_time')
                                    ->numeric()
                                    ->label('expire time of caching instagram posts. (Sec)')
                                    ->nullable(),
                            ]),
                        Tabs\Tab::make('Addresses')
                            ->columns(2)
                            ->columnSpanFull()
                            ->schema([
                                TextInput::make('main_address_en')
                                    ->required(),
                                TextInput::make('main_address_ar')
                                    ->required(),
                                TextInput::make('main_address_email')
                                    ->email()
                                    ->required(),
                                Repeater::make('main_address_phones')
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('phone')
                                            ->required(),
                                    ]),

                                Map::make('location')
                                    ->label('Location')
                                    ->afterStateUpdated(function (Get $get, Set $set, string|array|null $old, ?array $state): void {
                                        $set('latitude', $state['lat']);
                                        $set('longitude', $state['lng']);
                                    })
                                    ->afterStateHydrated(function ($state, $record, Set $set): void {
                                        $set('location', ['lat' => $state['lat'], 'lng' => $state['lng']]);
                                    })
                                    ->extraStyles([
                                        'min-height: 250px',
                                        'border-radius: 5px'
                                    ])
                                    ->liveLocation()
                                    ->showMarker()
                                    ->markerColor("#22c55eff")
                                    ->showFullscreenControl()
                                    ->showZoomControl()
                                    ->columnSpanFull()
                                    ->draggable()
                                    ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                                    ->zoom(10)
                                    ->detectRetina()
                                    ->showMyLocationButton()
                                    ->extraTileControl([])
                                    ->extraControl([
                                        'zoomDelta'           => 1,
                                        'zoomSnap'            => 2,
                                    ]),
                                Repeater::make('branches')
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('title_en')
                                            ->required(),
                                        TextInput::make('title_ar')
                                            ->required(),
                                        TextInput::make('address_en')
                                            ->required(),
                                        TextInput::make('address_ar')
                                            ->required(),
                                        Repeater::make('phones')
                                            ->columns(2)
                                            ->columnSpan(2)
                                            ->schema([
                                                TextInput::make('phone')
                                                    ->required(),
                                            ]),
                                    ]),
                                Forms\Components\Repeater::make('branches_other_country')
                                    ->columnSpan(2)
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('country_name_en')
                                            ->required(),
                                        TextInput::make('country_name_ar')
                                            ->required(),
                                        Repeater::make('branches')
                                            ->columns(2)
                                            ->columnSpan(2)
                                            ->schema([
                                                TextInput::make('title_en')
                                                    ->required(),
                                                TextInput::make('title_ar')
                                                    ->required(),
                                                TextInput::make('address_en')
                                                    ->required(),
                                                TextInput::make('address_ar')
                                                    ->required(),
                                                Repeater::make('phones')
                                                    ->columns(2)
                                                    ->columnSpan(2)
                                                    ->schema([
                                                        TextInput::make('phone')
                                                            ->required(),
                                                    ]),
                                            ]),
                                    ])
                                    ->columnSpanFull(),
                            ]),

                    ]),
            ]);
    }
}
