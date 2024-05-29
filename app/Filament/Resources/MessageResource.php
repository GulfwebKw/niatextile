<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Placeholder::make('trade_account_number')
                    ->content(fn($record) => $record->trade_account_number),
                Forms\Components\Placeholder::make('business_name')
                    ->content(fn($record) => $record->business_name),
                Forms\Components\Placeholder::make('name')
                    ->content(fn($record) => $record->name),
                Forms\Components\Placeholder::make('email')
                    ->content(fn($record) => $record->email),
                Forms\Components\Placeholder::make('subject')
                    ->content(fn($record) => $record->subject),
                Forms\Components\Placeholder::make('ip_address')
                    ->content(fn($record) => $record->ip_address),
                Forms\Components\Placeholder::make('created_at')
                    ->content(fn($record) => $record->created_at),
                Forms\Components\Textarea::make('message')
                    ->rows(10)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('trade_account_number')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('is_read'),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->defaultSort('is_read')
            ->defaultSort('id' , 'desc')
            ->bulkActions([
            ]);
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
            'index' => Pages\ListMessages::route('/'),
            'view' => Pages\ViewMessage::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::query()
            ->where('is_read' , false)
            ->count();
    }
}
