# Hallo!

Mit **GCM Slides** können mit wenig Aufwand Präsentationen erstellt werden.

Auf der linken Seite kann Text eingegeben werden.
Dieser wird automatisch in die Folien auf der rechten Seite umgewandelt.

---

## Einführung

**GCM Slides** verwendet die Sprache *Markdown*.

Das bedeutet, bestimmte Zeichen können Text formatieren.
Werden zum Beispiel um ein Wort Sternchen gesetzt, wird dieses Wort *kursiv*.
Doppelte Sternchen machen Text **fett**, doppelte Tilden ~~streichen durch~~.

Drei Minuszeichen erzeugen eine neue Folie, so wie hier:

---

# What You See Is<br>*Not* What You Get
## Unterüberschrift
### Unter-Unterüberschrift
#### Und So Weiter

---

## Text

Zeilenumbrüche werden mit einem Backslash am Zeilenende \
markiert.

Absätze werden durch eine leere Zeile voneinander getrennt.

*****

Außerdem können mit fünf Sternchen horizontale Trennlinien eingefügt werden.

---

## Listen

Listen können ungeordnet sein:
- Äpfel
- Milch
  - Soja oder Mandel
- Orangen

…oder auch geordnet:
1. Home
2. Sweet
3. Home

---

## Links

Links werden automatisch erkannt: https://gcm.schule/

Optional kann auch ein [anderer Text](https://gcm.schule/) angegeben werden.

---

## Bilder

Bilder aus dem gesamten Web können verwendet werden:

![Ein Beispielbild von Wikipedia](https://upload.wikimedia.org/wikipedia/commons/0/02/Malchow_Schule_im_Gr%C3%BCnen_2012-10-10_ama_fec_%281%29.JPG)

---

## Zitate

>> You miss 100% of the shots you don't take.
>
> Wayne Gratzky

Michael Scott

---

## Code

Code kann entweder `direkt inline` dargestellt werden, oder auch als

```javascript
function codeBlock() {
  return 'mit farblicher Syntaxhervorhebung';
}
```

---

## Tabellen

Tabellen sehen in Markdown sehr ✨fancy✨ aus:

KfZ-Kennzeichen | Stadt         | Bundesland
----------------|---------------|-----------
A               | Augsburg      | Bayern
B               | Berlin        | Berlin
C               | Chemnitz      | Sachsen
D               | Düsseldorf    | Nordrhein-Westfahlen


---

## LaTeX

GCM Slides bietet eingebaute Unterstützung für Formeln.
Diese nutzen \\( \LaTeX \\)-Syntax, welche häufig für wissenschaftliche Arbeiten verwendet wird.

$$ E = m \cdot c^2 $$

$$ x_{1/2} = -{p\over 2} \pm \sqrt{
  \left( p\over 2 \right)^2 - q} $$

---

## Bilder (erweitert)

![Ein linksbündig ausgerichtetes Bild !left !white !round](https://gcm.schule/logos/neo.svg)
Bilder können mit **Alt-Tags** angeordnet werden. Diese sind Teil des Alt-Attributs des Bildes,
und können beliebig kombiniert werden. Rechts- oder linksbündig ausgerichtete Bilder lassen im
restlichen Teil der Folie noch Text zu, dieser wird automatisch um das Bild herum angeordnet.

---

## Bilder (erweitert)

![Ein rechtsbündig ausgerichtetes Bild !right !white !round](https://gcm.schule/logos/neo.svg)
Bilder sind immer Teil eines Absatzes und an diesen gebunden.

Der folgende Absatz wird unter dem Bild angeordnet.

---

### Alt Tags

Alt Tag | Funktion
--------|:--------
`!white`|transparente Teile des Bildes weiß gefüllt
`!black`|transp. Teile des Bildes schwarz gefüllt
`!round`|abgerundete Ecken
`!right`|im Absatz rechts ausgerichtet
`!left` |im Absatz links ausgerichtet
`!small`|kleines Bild
`!large`|großes Bild

---

### Mehr Alt Tags

Alt Tag   | Funktion
----------|:--------
`!contain`|Bild füllt die ganze Folie aus. Das gesamte Bild ist zu sehen.
`!cover`  |Bild füllt die ganze Folie aus. Die gesamte Folie ist bedeckt.

Transparente Bilder mit `!contain` oder `!cover` werden innerhalb einer Folie aufeinander angezeigt.
Diese Alt Tags sind mit den Hintergrundfarben der letzten Folie kombinierbar, siehe nächste Folie.

---

![!cover !white](https://gcm.schule/logos/neo-black.svg)
![!contain](https://gcm.schule/logos/neo.svg)

---

# Das war's!

## Have a lot of fun!

---

# Abspann

GCM Slides wurde entwickelt von [eintyp](https://github.com/eintyp) und [ijontychie](https://github.com/ijontychie).
Aber das Projekt ruht auf den Schultern von Giganten.
Neben den Programmiersprachen stecken im Kern [marked](https://marked.js.org) und [MathJax](https://mathjax.org). \
Beide Projekte sind frei (wie in Freiheit) und open-source.
