<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use App\Models\TypeContact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactsRelationManager extends RelationManager
{
    protected static string $relationship = 'customer_contacts';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('customer.relation.contacts.title');
    }

    public static function getModelLabel(): ?string
    {
        return __('customer.relation.contacts.modelLabel');
    }

    public static function getPulralModelLabel(): ?string
    {
        return __('customer.relation.contacts.pluralModelLabel');
    }

    public function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\Select::make('type_contact_id')
                    ->options(TypeContact::all()->pluck('name', 'id'))
                    ->label(__('customer.relation.contacts.table.type_contact'))
                    ->required()
                    ->markAsRequired(),
                Forms\Components\TextInput::make('contact')
                    ->label(__('customer.relation.contacts.table.contact'))
                    ->required()
                    ->maxLength(80),
                Forms\Components\TextInput::make('contactName')
                    ->required()
                    ->maxLength(80)
                    ->label(__('customer.relation.contacts.table.contact_name')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('contact')
            ->description(__('customer.relation.contacts.description'))
            ->columns([
                Tables\Columns\TextColumn::make('type_contact.name')
                    ->label(__('customer.relation.contacts.table.type_contact'))
                    ->badge(),
                Tables\Columns\TextColumn::make('contact')
                    ->label(__('customer.relation.contacts.table.contact')),
                Tables\Columns\TextColumn::make('contactName')
                    ->label(__('customer.relation.contacts.table.contact_name')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
