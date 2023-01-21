import { useCampuses } from "../api/campuses";

function CampusesAccordion() {

  const { campuses } = useCampuses();

  const outputCampuses = campuses.map((campus) => {
    return <>
      <li><input type="checkbox" className="custom-checkbox" id={ campus.name } name={ campus.name } value="yes"/>
        <label htmlFor={ campus.name }>{ campus.name }</label>
      </li>
    </>
  });

  const accordionTitle = "Filter by campus";

  return (
    <div className="accordion-item bdnone">
      <h2 className="accordion-header" id="panelsStayOpen-headingOne">
        <button className="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
          { accordionTitle }
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" className="accordion-collapse collapse show"
           aria-labelledby="panelsStayOpen-headingOne">
        <div className="accordion-body">
          <ul>
            { outputCampuses }
          </ul>
        </div>
      </div>
    </div>
  )

}

export default CampusesAccordion
