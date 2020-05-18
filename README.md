# Описание

Пакет позволяет определить обязательные поля для `IItem`-совместимого класса.

# Применение

## Определение обязательных полей

Для определения обязательных полей используется пакет `extas-fields`. 

`extas.json`

```json
{
  "fields": [
    {
      "name": "my_field",
      "title": "My field",
      "description": "Example of usage",
      "type": "string",
      "parameters": {
        "subject": {
          "name": "subject",
          "value": "my.subject"
        },
        "required": {
          "name": "required",
          "value": true
        }
      }
    }
  ]
}
```

Далее необходимо подключить плагин текущего пакета для нужных вам сущностей.

`Примечание: если у вас используются какие-либо другие планины для стадии инициализации объекта, то рекомендуется устанавливать текущий плагин с отрицательным приоритетом, чтобы он выполнился последним.`

`extas.json`

```json
{
  "plugins": [
    {
      "class": "extas\\components\\plugins\\PluginFieldsDefaults",
      "stage": ["my.subject.init"],
      "priority": -1
    }
  ]
}
```

Установите поля и плагин

`# vendor/bin/extas i`

## Использование

```php
// Will throw an exception 'Missed field "my_field"'
$my = new class extends Item {
    protected function getSubjectForExtension(): string
    {
        return 'my.subject';
    }
};
```