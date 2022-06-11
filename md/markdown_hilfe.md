# What You See Is *Not* What You Get
## Unterüberschrift
### Noch Viel Kleinere Unterunterüberschrift
#### Und So Weiter

---

## Einführung

**CampusSlides** verwendet die Sprache *Markdown*, um
Präsentationen zu erstellen. Hier haben wir einige
Beispielfolien zusammengestellt, um die Sprache allen
weniger erfahrenen Usern näher zu bringen.

Das Ganze sollte relativ verständlich und
selbsterklärend sein, Du solltest alles in kurzer
Zeit gut verstehen können.

---

## Text

Die Folien auf der rechten Seite wurden durch den \
Code auf der linken Seite generiert.

Hier wird ersichtlich, dass man für Zeilenumbrüche \
eine Zeile frei lassen, oder am Zeilenende einen
Rückwärtsschrägstrich setzen muss.

Einfache Textformatierung funktioniert wie folgt:
*kursiv*
**fett**
~~durchgestrichen~~

*****

Text kann mit horizontalen Linien visuell getrennt
werden.

---

Markdown ermöglicht ein einfaches Einfügen von
[Links](https://gcm.schule/)…

…welche auch automatisch erkannt werden: \
https://gcm.schule/

Bilder aus dem gesamten Web können verwendet werden:

![Bildbeschreibung](https://gcm.schule/slides/gcm.svg)

---

## Listen

Listen können unsortiert sein:
- drücke `f` für Vollbildmodus
- drücke `o` für eine Folienübersicht
  - das funktioniert auch mit `esc`
- drücke `b` um die Präsentation auszublenden
- drücke `s` für eine Moderationsansicht

---

## Noch Viel Mehr Listen

…oder auch sortiert:
1. öffne https://gcm.schule/slides/
   1. dieser Link wird automatisch erkannt
   2. kann allerdings keinen userdefinierten
      Text anzeigen
2. Markdown eingeben
3. speichern
4. Mit all Deinen Freunden teilen!
42. die Zahl, die vor dem Stichpunkt steht, spielt
    dabei keine Rolle, die Punkte werden trotzdem
    von oben nach unten durchnummeriert.

---

## Zitate

> Zitate
>> können auch
>>> verschachtelt sein

---

## Code

Code kann entweder `direkt inline` dargestellt
werden, oder auch als

```
function codeBlock (a, b) {
  print ('mit farblicher Syntaxhervorhebung');
  let c = a*b*5; // **Markdown** ~~Syntax~~ wird in
  // Codeblöcken ignoriert
  return c;
}
```

---

## Tabellen

Tabellen sehen in Markdown sehr ✨fancy✨ aus:

| Tabellen    | Werden    | Unterstützt         |
| :---------- | :-------: | ------------------: |
| und Spalten | können    | ausgerichtet werden |
| linksbündig | zentriert | rechtsbündig        |

---

## Tabellen

Allerdings sind einige Teile nicht notwendig:

die Linien müssen|nicht ordentlich|angeordnet sein,
:--|:-:|--:
und einige|können weggelassen|werden
aber es sieht|*soooo* viel|besser aus!

---

## LaTeX

CampusSlides bietet eingebaute Unterstützung für
Formeln. Diese nutzen LaTeX-Syntax, welche häufig für
wissenschaftliche Arbeiten verwendet wird.

`$$ E = m \cdot c^2 $$`

`$$ x_{1/2} = -{p\over 2} \pm \sqrt{
  \left( p\over 2 \right)^2 - q} $$`

---

# Das war's!

## Have a lot of fun!

---

# Abspann

CampusSlides wurde entwickelt von
[eintyp](https://github.com/eintyp) und
[ijontychie](https://github.com/ijontychie).
Aber das Projekt ruht auf den Schultern von Giganten.
Neben den Programmiersprachen steckt im Kern
[reveal.js](https://revealjs.com/). Das Projekt
selbst ist Open Source, aber die Entwickler haben ein
kostenpflichtiges WYSIWYG-Tool mit dem man schöne
HTML5-Präsentationen bauen kann:
[slides](https://slides.com/).
