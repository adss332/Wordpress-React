import { useCtypes } from "../api/сtypes";

function CtypesAccordion() {

  const { ctypes } = useCtypes();

  const outputCtypes = ctypes.map((ctype) => {
    return <>
      <li><input type="checkbox" className="custom-checkbox" id={ ctype.name } name={ ctype.name } value="yes"/>
        <label htmlFor={ ctype.name }>{ ctype.name }</label>
      </li>
    </>
  });

  const accordionTitle = "Filter by course type";

  return (
    <div className="accordion-item bdnone">
      <h2 className="accordion-header" id="panelsStayOpen-headingTwo">
        <button className="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseTwo">
          { accordionTitle }
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" className="accordion-collapse collapse show"
           aria-labelledby="panelsStayOpen-headingTwo">
        <div className="accordion-body">
          <ul>
            { outputCtypes }
          </ul>
        </div>
      </div>
    </div>
  )

}

export default CtypesAccordion
