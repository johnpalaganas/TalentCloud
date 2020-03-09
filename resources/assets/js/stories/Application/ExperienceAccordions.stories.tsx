import React from "react";
import { storiesOf } from "@storybook/react";
import { withIntl } from "storybook-addon-intl";
import { select, text, number, boolean } from "@storybook/addon-knobs";
import { BaseExperienceAccordion } from "../../components/Application/Experience/BaseExperienceAccordion";
import { action } from "@storybook/addon-actions";

const stories = storiesOf(
  "Application|Experience Accordions",
  module,
).addDecorator(withIntl);

const iconClassOptions = {
  education: "fa-book",
  work: "fa-briefcase",
  community: "fa-people-carry",
  personal: "fa-mountain",
  award: "fa-trophy",
};

const educationDetails = (
  <div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Type of Experience:</p>
      <p>
        <i
          className="fas fa-book"
          data-c-color="c1"
          data-c-margin="right(.25)"
        ></i>
        Education Experience
      </p>
    </div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Type of Education:</p>
      <p>University</p>
    </div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Area of Study:</p>
      <p>Engineering</p>
    </div>
  </div>
);
const workDetails = (
  <div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Type of Experience:</p>
      <p>
        <i
          className="fas fa-briefcase"
          data-c-color="c1"
          data-c-margin="right(.25)"
        ></i>
        Work Experience
      </p>
    </div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Role / Job Title:</p>
      <p>Manager</p>
    </div>
    <div data-c-grid-item="base(1of2) tl(1of3)">
      <p data-c-font-weight="bold">Organization / Company:</p>
      <p>Talent Cloud</p>
    </div>
  </div>
);

const detailsSections = {
  education: "EDUCATION",
  work: "WORK",
};

const skillClaims = [
  {
    id: 2,
    name: "Web Programming",
    claim:
      "I did lots of web programming as part of this experience. I built my own website and maintained it for a long time.",
  },
  {
    id: 15,
    name: "Open Source Development",
    claim:
      "Most of my work is available on github. The work I did as part of this experience has been used by several organisations now.",
  },
  {
    id: 20,
    name: "Integrity",
    claim:
      "I had many opportunities to sabotage my teams work at that experience, and I chose not to.",
  },
];

stories.add(
  "Base Experience Accordion",
  (): React.ReactElement => {
    const detailsMap = {
      EDUCATION: educationDetails,
      WORK: workDetails,
    };
    const detailsChoice = select("Details", detailsSections, "education");
    const details = detailsMap[detailsChoice];
    return (
      <div data-c-accordion-group>
        <BaseExperienceAccordion
          title={text("Title", "My First Experience")}
          iconClass={select("Icon", iconClassOptions, "education")}
          relevantSkills={skillClaims}
          irrelevantSkillCount={number("Irrelevant Skill count", 0)}
          isEducationJustification={boolean(
            "Is Education Justification?",
            false,
          )}
          details={details}
          showSkillDetails={boolean("Show skill details?", false)}
          showButtons={boolean("Show buttons?", false)}
          handleDelete={action("Delete Experience")}
          handleEdit={action("Edit Experience")}
        />
      </div>
    );
  },
);