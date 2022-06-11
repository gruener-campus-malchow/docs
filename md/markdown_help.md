# What You See Is *Not* What You Get
## Subheading
### Even Smaller Heading
#### And So On

---

## Introduction

**CampusSlides** uses a language called *Markdown*
to create presentations. We've put together these
example slides to help those who are unfamiliar with
the language.

Everything should be pretty self explanatory, and you
should be able to learn the language pretty quickly.

---

## Text

The code on the left side generates the slides \
on the right side.

Note that you have to leave an empty line or use \
a backslash for line breaks.

You can format text:
*italic*
**bold**
~~strikethrough~~

*****

You can visually separate content using horizontal
lines.

---

You can insert [links](https://gcm.schule/)…

…which can get converted automatically: \
https://gcm.schule/

You can also use images from anywhere on the web:
![image description](https://gcm.schule/slides/gcm.svg)

---

## Lists

Lists can be unordered:
- press `f` for fullscreen
- press `o` for tile view
  - also works with `esc`
- press `b` to fade out
- press `s` for speaker view

---

## Even More Lists

or ordered:
1. go to https://gcm.schule/slides/
   1. this link will automatically be clickable
   2. but won't display custom text
2. enter some markdown
3. save
4. share!
42. the number you use doesn't matter, the list
    will be numbered correctly regardless

---

## Blockquotes

> blockquotes
>> can be
>>> nested

---

## Code

You can use `inline code` or make a

```
function codeBlock (a, b) {
  print ('with syntax highlighting');
  let c = a*b*5; // as you can see, **markdown**
  // ~~syntax~~ will be ignored in code blocks
  return c;
}
```

---

## Tables

Tables in markdown look pretty neat:

| Tables       | Are      | Supported     |
| :----------- | :------: | ------------: |
| and columns  | can be   | aligned       |
| left-aligned | centered | right-aligned |

---

## Tables

However some parts can be omitted:

the fomatting doesn't|need to|line up,
:--|:-:|--:
and some|elements are|optional
but it|sure looks|prettier

---

## LaTeX

CampusSlides has built-in functionality for
displaying Formulas. These use LaTeX Syntax, and also
look pretty cool:

`$$ E = m \cdot c^2 $$`

`$$ x_{1/2} = -{p\over 2} \pm \sqrt{
  \left( p\over 2 \right)^2 - q} $$`

---

# That's all!

## Have a lot of fun!

---

# Credits

CampusSlides was developed by
[eintyp](https://github.com/eintyp) and
[ijontychie](https://github.com/ijontychie).
The project is standing on the shoulders of giants:
Besides the languages, we heavily rely on
[reveal.js](https://revealjs.com/) as the core
technology. Reveal.js is open source, but its
developers also made a WYSIWYG tool, which can be
used to create beautiful HTML5 presentations:
[slides](https://slides.com/).
