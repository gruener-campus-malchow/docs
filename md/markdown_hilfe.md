# What You See Is<br>*Not* What You Get
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

![Bildbeschreibung](https://gcm.schule/public/logos/logo-white.svg)

---

## Listen

Listen können unsortiert sein:
- Äpfel
- Orangen
- Milch
  - Soja oder Mandel
- Avocado

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
  print ('mit (ohne?) farblicher Syntaxhervorhebung');
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
Formeln. Diese nutzen \\( \LaTeX \\)-Syntax, welche
häufig für wissenschaftliche Arbeiten verwendet wird.

$$ E = m \cdot c^2 $$

$$ x_{1/2} = -{p\over 2} \pm \sqrt{
  \left( p\over 2 \right)^2 - q} $$

---

# Das war's!

## Have a lot of fun!

---

# Abspann

CampusSlides wurde entwickelt von
[eintyp](https://github.com/eintyp) und
[ijontychie](https://github.com/ijontychie).
Aber das Projekt ruht auf den Schultern von Giganten.
Neben den Programmiersprachen stecken im Kern
[marked](https://marked.js.org) und
[MathJax](https://mathjax.org). \
Beide Projekte sind frei (wie in Freiheit) und open-source.
