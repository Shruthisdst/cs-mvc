var affiliation = 0;
var numAuthors = 0;

function addTextBox(btn)
{
	affiliation++;

	var olElement = document.getElementById("orderedlist");

	var liElement = document.createElement("li");
	liElement.setAttribute("id", "aff-" + affiliation);

	var textElement = document.createElement("input");
	textElement.setAttribute("type", "text");
	textElement.setAttribute("placeholder", "Add author address");
	textElement.setAttribute("name", "afflist[]");

	var removeElement = document.createElement("input");
	removeElement.setAttribute("type", "button");
	removeElement.setAttribute("value", "Remove");
	removeElement.setAttribute("onclick", "removeListElement("+ "'aff-" + affiliation + "')");

	liElement.appendChild(textElement);
	liElement.appendChild(removeElement);

	olElement.appendChild(liElement,olElement);	

}

function removeListElement(elementToRemove)
{
	//alert(elementToRemove);
	var olElement = document.getElementById("orderedlist");
	var liElement = document.getElementById(elementToRemove);
	olElement.removeChild(liElement);
	affiliation--;
}

function addAuthors(addAuthorbtn)
{
	numAuthors++;

	var Authlist = document.getElementById("Authlist");

	var divAuthor = document.createElement("div");
	divAuthor.setAttribute("id", "author" + numAuthors);
	divAuthor.setAttribute("class", "eachauthor");
	Authlist.appendChild(divAuthor);

	var surName = document.createElement("input");
	surName.setAttribute("type", "text");
	surName.setAttribute("placeholder", "Surname");
	surName.setAttribute("name", "group[auth" + numAuthors + "][]");

	var givenName = document.createElement("input");
	givenName.setAttribute("type", "text");
	givenName.setAttribute("placeholder", "Given Name");
	givenName.setAttribute("name", "group[auth" + numAuthors + "][]");

	var email = document.createElement("input");
	email.setAttribute("type", "text");
	email.setAttribute("placeholder", "Email");
	email.setAttribute("name", "group[auth" + numAuthors + "][]");

	var affilNumbers = document.createElement("input");
	affilNumbers.setAttribute("type", "text");
	affilNumbers.setAttribute("placeholder", "Affiliation Number");
	affilNumbers.setAttribute("name", "group[auth" + numAuthors + "][]");

	var removeAuthorBtn = document.createElement("input");
	removeAuthorBtn.setAttribute("type", "button");
	removeAuthorBtn.setAttribute("value", "Remove Author");
	removeAuthorBtn.setAttribute("onclick", "removeAuthor("+ "'author" + numAuthors + "')");

	divAuthor.appendChild(surName);
	divAuthor.appendChild(givenName);
	divAuthor.appendChild(email);
	divAuthor.appendChild(affilNumbers);
	divAuthor.appendChild(removeAuthorBtn);
}

function removeAuthor(authorToRemove)
{
	var Authlist = document.getElementById("Authlist");
	var author = document.getElementById(authorToRemove);
	Authlist.removeChild(author);
	//~ numAuthors--;
}

