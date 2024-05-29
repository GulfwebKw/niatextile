<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutSectionResource\Pages;
use App\Filament\Resources\AboutSectionResource\RelationManagers;
use App\Models\AboutSection;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutSectionResource extends Resource
{
    use Translatable;
    protected static ?string $model = AboutSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('title')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('about-sections/'.now()->format('Y/m/d'))
                    ->imageEditor()
                    ->nullable(),
                \Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor::make('content')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\Checkbox::make('is_active')
                    ->inline(),
                Forms\Components\Checkbox::make('use_inside_homepage')
                    ->inline(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('use_inside_homepage'),
                Tables\Columns\BooleanColumn::make('is_active'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->reorderable('ordering')
            ->paginatedWhileReordering(false)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('id' , 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutSections::route('/'),
            'create' => Pages\CreateAboutSection::route('/create'),
            'edit' => Pages\EditAboutSection::route('/{record}/edit'),
        ];
    }
}
